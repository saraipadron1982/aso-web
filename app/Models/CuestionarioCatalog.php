<?php
declare(strict_types=1);

final class CuestionarioCatalog
{
    private const FILE = __DIR__ . '/../Data/bateria_v3.xml';

    /**
     * @return array<string, array{codigo:string,nombre:string,opcional:bool,puntua:bool,dimensiones:list<array{nombre:string,items:list<array{codigo:string,texto:string,puntua:bool}>}>}>
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
        foreach ($xml->cuestionario as $c) {
            $dimensions = [];
            $scored = false;
            foreach ($c->dimension as $d) {
                $items = [];
                foreach ($d->item as $item) {
                    $puntua = (string) $item['formato'] === 'frecuencia_provisional';
                    $scored = $scored || $puntua;
                    $items[] = ['codigo' => (string) $item['codigo'], 'texto' => trim((string) $item), 'puntua' => $puntua];
                }
                $dimensions[] = ['nombre' => (string) $d['nombre'], 'items' => $items];
            }
            $code = (string) $c['codigo'];
            $result[$code] = [
                'codigo' => $code,
                'nombre' => (string) $c['nombre'],
                'opcional' => (string) $c['administracion'] !== '',
                'puntua' => $scored,
                'dimensiones' => $dimensions,
            ];
        }
        return $result;
    }

    /** Estructura mínima para puntuar en el navegador. */
    public static function definition(): array
    {
        $out = [];
        foreach (self::all() as $code => $q) {
            if (!$q['puntua']) {
                continue;
            }
            $out[$code] = ['nombre' => $q['nombre'], 'dimensiones' => array_map(static fn (array $d): array => [
                'nombre' => $d['nombre'],
                'scored' => array_values(array_column(array_filter($d['items'], static fn (array $i): bool => $i['puntua']), 'codigo')),
                'extra' => array_values(array_column(array_filter($d['items'], static fn (array $i): bool => !$i['puntua']), 'codigo')),
            ], $q['dimensiones'])];
        }
        return $out;
    }
}
