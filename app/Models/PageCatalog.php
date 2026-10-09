<?php
declare(strict_types=1);

final class PageCatalog
{
    private const PAGES = [
        'index.html' => [
            'view' => 'index.php',
        ],
        'FAND_Cuestionarios_Edades_Perfiles.html' => [
            'view' => 'FAND_Cuestionarios_Edades_Perfiles.php',
        ],
        'FAND_Diccionario_Neurodivergencia.html' => [
            'view' => 'FAND_Diccionario_Neurodivergencia.php',
        ],
        'FAND_Directorio.html' => [
            'view' => 'FAND_Directorio.php',
        ],
        'FAND_Formaciones_Oficiales.html' => [
            'view' => 'FAND_Formaciones_Oficiales.php',
        ],
        'FAND_Herramientas_Digitales.html' => [
            'view' => 'FAND_Herramientas_Digitales.php',
        ],
        'FAND_Historia_Neurodivergencia_Orden_Cronologico.html' => [
            'view' => 'FAND_Historia_Neurodivergencia_Orden_Cronologico.php',
        ],
        'FAND_Juegos_Interactivos.html' => [
            'view' => 'FAND_Juegos_Interactivos.php',
        ],
        'FAND_Neurodivergencia_Inclusion_Laboral_2026.html' => [
            'view' => 'FAND_Neurodivergencia_Inclusion_Laboral_2026.php',
        ],
        'articulos/neurodivergencia-redes-sociales.html' => [
            'view' => 'articulos/neurodivergencia-redes-sociales.php',
        ],
        'articulos/poblacion-neurodivergente.html' => [
            'view' => 'articulos/poblacion-neurodivergente.php',
        ],
    ];

    public static function find(string $route): ?array
    {
        return self::PAGES[$route] ?? null;
    }
}
