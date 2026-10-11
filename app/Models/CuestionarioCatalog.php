<?php
declare(strict_types=1);

/**
 * Protocolo FAND v7 (prototipo no validado): registro I01 (respuestas abiertas, sin puntuar) y
 * módulos C01–C09 con afirmaciones en escala 0–4 de conformidad, agrupadas por dimensión.
 */
final class CuestionarioCatalog
{
    private const FILE = __DIR__ . '/../Data/protocolo_v7.xml';
    private const INFORMANTES = __DIR__ . '/../Data/informantes.php';
    /** Recorrido guiado en orden; el resto de módulos son opcionales. */
    private const FLOW = ['I01', 'C01', 'C04', 'C02', 'C03', 'C05'];
    public const SCALES = [
        'L' => [0 => 'Nada conforme', 1 => 'Poco conforme', 2 => 'Ni conforme ni disconforme', 3 => 'Bastante conforme', 4 => 'Muy conforme'],
    ];
    private const OBLIGATORIEDAD = ['obligatorio' => 'obligatorio', 'opcional' => 'opcional', 'condicional' => 'si procede'];

    /**
     * @return array<string, array{codigo:string,nombre:string,escala:string,objetivo:string,flujo:bool,puntua:bool,items:list<array{codigo:string,texto:string,dimension:string,periodo:string}>}>
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

        $extra = is_file(self::INFORMANTES) ? require self::INFORMANTES : [];
        $familia = $extra['familia'] ?? [];
        $result = [];
        $reg = [];
        foreach ($xml->registro->campo ?? [] as $c) {
            $label = self::OBLIGATORIEDAD[(string) $c['obligatoriedad']] ?? '';
            $reg[] = ['codigo' => (string) $c['codigo'], 'texto' => trim((string) $c) . ($label !== '' ? ' (' . $label . ')' : ''), 'dimension' => '', 'periodo' => '', 'familia' => ''];
        }
        if ($reg) {
            $result['I01'] = [
                'codigo' => 'I01', 'nombre' => 'Registro inicial', 'escala' => 'H',
                'objetivo' => 'Datos de identificación, informante, antecedentes, accesibilidad y consentimiento. Responde con tus palabras; deja en blanco lo que no sepas. No se puntúa.',
                'flujo' => true, 'puntua' => false, 'items' => $reg,
            ];
        }

        foreach ($xml->banco_items->modulo ?? [] as $m) {
            $code = (string) $m['codigo'];
            $name = trim(preg_replace('/^' . preg_quote($code, '/') . '\s+/', '', (string) $m['nombre']));
            $items = [];
            foreach ($m->dimension as $d) {
                $dim = trim(preg_replace('/^\S+\s+/', '', (string) $d['nombre']));
                foreach ($d->item as $it) {
                    $items[] = ['codigo' => (string) $it['codigo'], 'texto' => trim((string) $it), 'dimension' => $dim, 'periodo' => (string) $it['periodo'], 'familia' => $familia[(string) $it['codigo']] ?? ''];
                }
            }
            $result[$code] = [
                'codigo' => $code, 'nombre' => $name, 'escala' => 'L', 'objetivo' => '',
                'flujo' => in_array($code, self::FLOW, true), 'puntua' => true, 'items' => $items,
            ];
        }
        $school = $extra['escuela'] ?? null;
        if ($school) {
            $items = [];
            foreach ($school['dimensiones'] as $dim => $list) {
                foreach ($list as [$id, $text]) {
                    $items[] = ['codigo' => $id, 'texto' => $text, 'dimension' => $dim, 'periodo' => 'ultimo_trimestre', 'familia' => $text];
                }
            }
            $result['E01'] = [
                'codigo' => 'E01', 'nombre' => $school['nombre'], 'escala' => 'L', 'objetivo' => $school['objetivo'],
                'flujo' => false, 'puntua' => true, 'items' => $items, 'solo' => 'docente',
            ];
        }
        return $result;
    }

    /** Estructura mínima para puntuar en el navegador: una entrada por dimensión de cada módulo. */
    public static function definition(): array
    {
        $out = [];
        foreach (self::all() as $code => $q) {
            if (!$q['puntua']) {
                continue;
            }
            $dims = [];
            foreach ($q['items'] as $item) {
                $dims[$item['dimension']][] = $item['codigo'];
            }
            $list = [];
            foreach ($dims as $name => $ids) {
                $list[] = ['nombre' => $name, 'scored' => $ids, 'extra' => []];
            }
            $out[$code] = ['nombre' => $q['nombre'], 'max' => 4, 'dimensiones' => $list];
        }
        return $out;
    }

    /** Códigos del recorrido guiado, en orden. */
    public static function flow(): array
    {
        return self::FLOW;
    }
}
