<?php
declare(strict_types=1);

/** Banco FAND v5 (no validado): bloques con escala F (frecuencia 0–3), I (intensidad 0–3) o H (respuesta abierta, sin puntuar). */
final class CuestionarioCatalog
{
    private const FILE = __DIR__ . '/../Data/bateria_v5.xml';
    /** Bloques que forman el recorrido guiado; el resto son opcionales. */
    private const FLOW = ['I01', 'F01', 'D01', 'A01', 'A02', 'A03', 'S01', 'S02', 'R01', 'R02'];
    public const SCALES = [
        'F' => [0 => 'Nunca o casi nunca', 1 => 'Algunas veces', 2 => 'A menudo', 3 => 'Muy a menudo'],
        'I' => [0 => 'Sin dificultad', 1 => 'Leve', 2 => 'Moderada', 3 => 'Intensa'],
    ];

    /**
     * @return array<string, array{codigo:string,nombre:string,escala:string,objetivo:string,flujo:bool,puntua:bool,items:list<array{codigo:string,texto:string}>}>
     */
    public static function all(): array
    {
        if (!is_file(self::FILE)) {
            return [];
        }
        $previous = libxml_use_internal_errors(true);
        $xml = simplexml_load_file(self::FILE);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        if ($xml === false) {
            return [];
        }

        $result = [];
        foreach ($xml->bloque as $b) {
            [$code, $name] = array_pad(explode(' ', (string) $b['nombre'], 2), 2, '');
            $items = [];
            foreach ($b->item as $item) {
                $items[] = ['codigo' => (string) $item['id'], 'texto' => trim((string) $item)];
            }
            $scale = (string) $b['escala'];
            $result[$code] = [
                'codigo' => $code,
                'nombre' => $name,
                'escala' => $scale,
                'objetivo' => trim((string) $b->objetivo),
                'flujo' => in_array($code, self::FLOW, true),
                'puntua' => isset(self::SCALES[$scale]),
                'items' => $items,
            ];
        }
        return $result;
    }

    /** Estructura mínima para puntuar en el navegador (solo bloques con escala). */
    public static function definition(): array
    {
        $out = [];
        foreach (self::all() as $code => $q) {
            if (!$q['puntua']) {
                continue;
            }
            $out[$code] = [
                'nombre' => $q['nombre'],
                'max' => 3,
                'dimensiones' => [['nombre' => $q['nombre'], 'scored' => array_column($q['items'], 'codigo'), 'extra' => []]],
            ];
        }
        return $out;
    }

    /** Códigos del recorrido guiado, en orden. */
    public static function flow(): array
    {
        return self::FLOW;
    }
}
