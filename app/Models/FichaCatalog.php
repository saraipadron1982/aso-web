<?php
declare(strict_types=1);

final class FichaCatalog
{
    private const DIRECTORY = __DIR__ . '/../Data/fichas';

    /** @return array<string, SimpleXMLElement> Fichas técnicas indexadas por código (J01…J07). */
    public static function all(): array
    {
        $fichas = [];
        $files = glob(self::DIRECTORY . '/J*.xml') ?: [];
        sort($files);

        $previous = libxml_use_internal_errors(true);
        foreach ($files as $file) {
            $xml = simplexml_load_file($file);
            if ($xml === false) {
                error_log('Ficha técnica no válida: ' . basename($file));
                continue;
            }
            $fichas[(string) $xml['codigo']] = $xml;
        }
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        return $fichas;
    }

    public static function label(string $tag): string
    {
        $text = str_replace('_', ' ', $tag);
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

    private static function renderTable(SimpleXMLElement $table): string
    {
        $cell = static fn (string $tag, string $text): string => '<' . $tag . '>' . htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8') . '</' . $tag . '>';
        $html = '<table class="ficha-table">';
        if (isset($table->columnas)) {
            $html .= '<thead><tr>';
            foreach (explode('|', (string) $table->columnas) as $c) {
                $html .= $cell('th', $c);
            }
            $html .= '</tr></thead>';
        }
        $html .= '<tbody>';
        foreach ($table->fila as $fila) {
            $html .= '<tr>';
            foreach (explode('|', (string) $fila) as $c) {
                $html .= $cell('td', $c);
            }
            $html .= '</tr>';
        }
        return $html . '</tbody></table>';
    }

    public static function render(SimpleXMLElement $node, int $depth = 3): string
    {
        $html = '';
        foreach ($node->children() as $name => $child) {
            $name = (string) $name;
            if ($name === 'tabla') {
                $html .= self::renderTable($child);
                continue;
            }
            $heading = $name === 'seccion' && (string) $child['titulo'] !== '' ? (string) $child['titulo'] : self::label($name);
            $title = htmlspecialchars($heading, ENT_QUOTES, 'UTF-8');
            $attributes = [];
            foreach ($child->attributes() as $key => $value) {
                if ($name === 'seccion' && (string) $key === 'titulo') {
                    continue;
                }
                $attributes[] = htmlspecialchars((string) $key . ': ' . (string) $value, ENT_QUOTES, 'UTF-8');
            }
            $suffix = $attributes ? ' <small>(' . implode(', ', $attributes) . ')</small>' : '';

            if (count($child->children()) === 0) {
                $text = trim((string) $child);
                if (isset($child->url) || $name === 'url') {
                    $text = trim((string) $child);
                }
                $safe = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
                if ($name === 'url' && preg_match('#^https?://#i', $text)) {
                    $safe = '<a href="' . $safe . '" rel="noopener noreferrer" target="_blank">' . $safe . '</a>';
                }
                $html .= '<p><strong>' . $title . $suffix . ':</strong> ' . $safe . '</p>';
            } else {
                $level = min($depth, 6);
                $html .= '<section class="sub"><h' . $level . '>' . $title . $suffix . '</h' . $level . '>'
                    . self::render($child, $depth + 1) . '</section>';
            }
        }
        return $html;
    }
}
