<?php
declare(strict_types=1);

/** Controla el acceso a la zona profesional y las acciones de administración. */
final class ProController
{
    public const LOGIN = 'FAND_Profesionales.html';
    public const ADMIN = 'FAND_Admin_Profesionales.html';

    /**
     * Devuelve los datos para la vista, o null si ya se ha redirigido y no hay que pintar nada.
     */
    public static function prepare(string $route, array $page): ?array
    {
        $guard = $page['guard'] ?? null;
        if ($guard === null) {
            return [];
        }

        ProAccess::start();
        header('Cache-Control: no-store');
        header('X-Robots-Tag: noindex, nofollow');

        $post = $_SERVER['REQUEST_METHOD'] === 'POST';
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        if ($route === self::LOGIN) {
            if ($post && ProAccess::checkCsrf()) {
                return self::handleLogin($route);
            }
            return ['flash' => $flash, 'csrf' => ProAccess::csrf(), 'authorized' => ProAccess::isAuthorized(), 'admin' => ProAccess::isAdmin(), 'name' => ProAccess::currentName(), 'next' => self::safeNext((string) ($_GET['next'] ?? ''))];
        }

        if ($route === self::ADMIN) {
            if ($post && ProAccess::checkCsrf()) {
                return self::handleAdmin($route);
            }
            $newCode = ProAccess::isAdmin() ? ($_SESSION['new_code'] ?? null) : null;
            unset($_SESSION['new_code']);
            return [
                'flash' => $flash, 'csrf' => ProAccess::csrf(), 'admin' => ProAccess::isAdmin(), 'configured' => ProAccess::adminConfigured(),
                'locked' => ProAccess::locked(), 'list' => ProAccess::isAdmin() ? ProAccess::professionals() : [],
                'newCode' => $newCode,
                'colegiadoRequerido' => ProAccess::COLEGIADO_REQUERIDO,
            ];
        }

        if (!ProAccess::isAuthorized()) {
            $uri = $route . (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? '?' . $_SERVER['QUERY_STRING'] : '');
            self::redirect(self::LOGIN . '?next=' . rawurlencode($uri));
            return null;
        }
        return ['csrf' => ProAccess::csrf(), 'name' => ProAccess::currentName(), 'admin' => ProAccess::isAdmin()];
    }

    private static function handleLogin(string $route): ?array
    {
        $action = (string) ($_POST['accion'] ?? '');
        if ($action === 'salir') {
            ProAccess::logout();
            self::redirect($route);
            return null;
        }
        if ($action === 'entrar') {
            if (ProAccess::loginPro((string) ($_POST['codigo'] ?? ''))) {
                self::redirect(self::safeNext((string) ($_POST['next'] ?? '')) ?: $route);
                return null;
            }
            $_SESSION['flash'] = ProAccess::locked() ? 'Demasiados intentos. Espera unos minutos y vuelve a probar.' : 'Código no válido o acceso revocado.';
        }
        self::redirect($route . (($n = self::safeNext((string) ($_POST['next'] ?? ''))) ? '?next=' . rawurlencode($n) : ''));
        return null;
    }

    private static function handleAdmin(string $route): ?array
    {
        $action = (string) ($_POST['accion'] ?? '');
        switch ($action) {
            case 'configurar':
                $ok = (string) ($_POST['clave'] ?? '') === (string) ($_POST['clave2'] ?? '') && ProAccess::setAdminPassword((string) ($_POST['clave'] ?? ''));
                $_SESSION['flash'] = $ok ? 'Contraseña de administración creada. Ya puedes iniciar sesión.' : 'Las contraseñas deben coincidir y tener al menos 10 caracteres.';
                break;
            case 'entrar':
                $_SESSION['flash'] = ProAccess::loginAdmin((string) ($_POST['clave'] ?? '')) ? null : (ProAccess::locked() ? 'Demasiados intentos. Espera unos minutos.' : 'Contraseña incorrecta.');
                break;
            case 'salir':
                ProAccess::logout();
                break;
        }
        if (ProAccess::isAdmin()) {
            switch ($action) {
                case 'crear':
                    $name = trim((string) ($_POST['nombre'] ?? ''));
                    if ($name === '') {
                        $_SESSION['flash'] = 'Indica el nombre de la persona.';
                        break;
                    }
                    $_SESSION['new_code'] = ['nombre' => $name, 'codigo' => ProAccess::createProfessional($name, (string) ($_POST['email'] ?? ''), (string) ($_POST['colegiado'] ?? ''))];
                    break;
                case 'revocar':
                case 'activar':
                    ProAccess::setStatus((string) ($_POST['id'] ?? ''), $action === 'activar' ? 'activo' : 'revocado');
                    break;
                case 'borrar':
                    ProAccess::delete((string) ($_POST['id'] ?? ''));
                    break;
            }
        }
        self::redirect($route);
        return null;
    }

    /** Solo se admiten destinos internos que existan y pertenezcan a la zona profesional. */
    private static function safeNext(string $next): string
    {
        if (!preg_match('/^([A-Za-z0-9_]+\.html)(\?[A-Za-z0-9=&_]*)?$/', $next, $m)) {
            return '';
        }
        $page = PageCatalog::find($m[1]);
        return $page !== null && ($page['guard'] ?? null) === 'pro' ? $next : '';
    }

    private static function redirect(string $url): void
    {
        header('Location: ' . $url, true, 303);
    }
}
