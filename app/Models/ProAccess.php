<?php
declare(strict_types=1);

/**
 * Acceso a la zona profesional.
 *
 * - Administración: una contraseña única (la de la persona responsable del proyecto).
 * - Profesionales: códigos de acceso personales, emitidos y revocables solo desde administración.
 * - Nº de colegiado: se puede anotar en cada ficha, pero todavía NO se exige ni se verifica.
 *   Para exigirlo en el futuro basta con activar COLEGIADO_REQUERIDO y completar la verificación.
 */
final class ProAccess
{
    public const COLEGIADO_REQUERIDO = false;

    private const FILE = __DIR__ . '/../../storage/acceso.json';
    private const ALPHABET = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    private const MAX_FAILURES = 5;
    private const LOCK_SECONDS = 900;

    public static function start(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax',
            'secure' => !empty($_SERVER['HTTPS']),
        ]);
        session_name('fand_pro');
        session_start();
    }

    private static function load(): array
    {
        $data = is_file(self::FILE) ? json_decode((string) file_get_contents(self::FILE), true) : null;
        $data = is_array($data) ? $data : [];
        return $data + ['admin_hash' => null, 'profesionales' => [], 'intentos' => []];
    }

    private static function save(array $data): void
    {
        $dir = dirname(self::FILE);
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        file_put_contents(self::FILE, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
    }

    public static function adminConfigured(): bool
    {
        return self::load()['admin_hash'] !== null;
    }

    public static function setAdminPassword(string $password): bool
    {
        $data = self::load();
        if ($data['admin_hash'] !== null || strlen($password) < 10) {
            return false;
        }
        $data['admin_hash'] = password_hash($password, PASSWORD_DEFAULT);
        self::save($data);
        return true;
    }

    // ---- Control de intentos por IP ----
    private static function clientKey(): string
    {
        return hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? 'local'));
    }

    public static function locked(): bool
    {
        $a = self::load()['intentos'][self::clientKey()] ?? null;
        return $a && $a['n'] >= self::MAX_FAILURES && time() - $a['t'] < self::LOCK_SECONDS;
    }

    private static function fail(): void
    {
        $data = self::load();
        $k = self::clientKey();
        $a = $data['intentos'][$k] ?? ['n' => 0, 't' => 0];
        if (time() - $a['t'] >= self::LOCK_SECONDS) {
            $a['n'] = 0;
        }
        $data['intentos'][$k] = ['n' => $a['n'] + 1, 't' => time()];
        self::save($data);
        usleep(600000);
    }

    private static function clearFailures(): void
    {
        $data = self::load();
        unset($data['intentos'][self::clientKey()]);
        self::save($data);
    }

    // ---- Inicio y cierre de sesión ----
    public static function loginAdmin(string $password): bool
    {
        if (self::locked()) {
            return false;
        }
        $hash = self::load()['admin_hash'];
        if ($hash === null || !password_verify($password, $hash)) {
            self::fail();
            return false;
        }
        self::clearFailures();
        session_regenerate_id(true);
        $_SESSION['rol'] = 'admin';
        unset($_SESSION['pro_id']);
        return true;
    }

    public static function loginPro(string $code): bool
    {
        if (self::locked()) {
            return false;
        }
        $hash = hash('sha256', self::normalize($code));
        foreach (self::load()['profesionales'] as $p) {
            if ($p['estado'] === 'activo' && hash_equals($p['codigo_hash'], $hash)) {
                self::clearFailures();
                session_regenerate_id(true);
                $_SESSION['rol'] = 'pro';
                $_SESSION['pro_id'] = $p['id'];
                return true;
            }
        }
        self::fail();
        return false;
    }

    public static function logout(): void
    {
        $_SESSION = [];
        session_regenerate_id(true);
    }

    public static function isAdmin(): bool
    {
        return ($_SESSION['rol'] ?? '') === 'admin';
    }

    /** El administrador siempre tiene acceso; un profesional solo mientras su acceso siga activo. */
    public static function isAuthorized(): bool
    {
        if (self::isAdmin()) {
            return true;
        }
        if (($_SESSION['rol'] ?? '') !== 'pro') {
            return false;
        }
        foreach (self::load()['profesionales'] as $p) {
            if ($p['id'] === ($_SESSION['pro_id'] ?? '') && $p['estado'] === 'activo') {
                return true;
            }
        }
        self::logout();
        return false;
    }

    public static function currentName(): string
    {
        if (self::isAdmin()) {
            return 'Administración';
        }
        foreach (self::load()['profesionales'] as $p) {
            if ($p['id'] === ($_SESSION['pro_id'] ?? '')) {
                return $p['nombre'];
            }
        }
        return '';
    }

    // ---- CSRF ----
    public static function csrf(): string
    {
        return $_SESSION['csrf'] ??= bin2hex(random_bytes(16));
    }

    public static function checkCsrf(): bool
    {
        return isset($_POST['csrf'], $_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string) $_POST['csrf']);
    }

    // ---- Gestión de profesionales (solo administración) ----
    public static function professionals(): array
    {
        return self::load()['profesionales'];
    }

    /** Devuelve el código en claro una sola vez; en el archivo solo se guarda su huella. */
    public static function createProfessional(string $name, string $email, string $colegiado): string
    {
        $code = '';
        for ($i = 0; $i < 12; $i++) {
            $code .= self::ALPHABET[random_int(0, strlen(self::ALPHABET) - 1)];
        }
        $data = self::load();
        $data['profesionales'][] = [
            'id' => bin2hex(random_bytes(6)),
            'nombre' => mb_substr(trim($name), 0, 80),
            'email' => mb_substr(trim($email), 0, 120),
            'colegiado' => mb_substr(trim($colegiado), 0, 30),
            'colegiado_verificado' => false,
            'codigo_hash' => hash('sha256', $code),
            'estado' => 'activo',
            'creado' => date('Y-m-d'),
        ];
        self::save($data);
        return implode('-', str_split($code, 4));
    }

    public static function setStatus(string $id, string $status): void
    {
        $data = self::load();
        foreach ($data['profesionales'] as &$p) {
            if ($p['id'] === $id) {
                $p['estado'] = $status === 'activo' ? 'activo' : 'revocado';
            }
        }
        self::save($data);
    }

    public static function delete(string $id): void
    {
        $data = self::load();
        $data['profesionales'] = array_values(array_filter($data['profesionales'], static fn (array $p): bool => $p['id'] !== $id));
        self::save($data);
    }

    private static function normalize(string $code): string
    {
        return preg_replace('/[^A-Z0-9]/', '', strtoupper($code)) ?? '';
    }
}
