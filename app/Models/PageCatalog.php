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
        'FAND_Test_Orientativo.html' => [
            'view' => 'FAND_Test_Orientativo.php',
        ],
        'FAND_Protocolo.html' => [
            'view' => 'FAND_Protocolo.php',
        ],
        'FAND_Fichas_Tecnicas.html' => [
            'view' => 'FAND_Fichas_Tecnicas.php',
        ],
        'FAND_Ficha_Usuario.html' => [
            'view' => 'FAND_Ficha_Usuario.php',
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

    private const SEARCH_INDEX = [
        ['Diccionario de neurodivergencia', 'FAND_Diccionario_Neurodivergencia.html', 'Guía', 'conceptos palabras vocabulario autismo tdah dislexia derechos aprendizaje comunicación'],
        ['Historia y cronología', 'FAND_Historia_Neurodivergencia_Orden_Cronologico.html', 'Guía', 'historia hitos ciencia leyes derechos perfiles'],
        ['Directorio de recursos', 'FAND_Directorio.html', 'Apoyos', 'asociaciones centros profesionales terapia diagnóstico territorio comunidad'],
        ['Herramientas digitales', 'FAND_Herramientas_Digitales.html', 'Apoyos', 'aplicaciones organización bienestar aprendizaje comunicación'],
        ['Juegos interactivos', 'FAND_Juegos_Interactivos.html', 'Apoyos', 'atención memoria lectura dislexia planificación práctica minijuegos'],
        ['Protocolo: cómo funcionan los juegos', 'FAND_Protocolo.html', 'Apoyos', 'protocolo funcionamiento juegos cuestionarios algoritmo adaptativo métricas informe edad investigación'],
        ['Test orientativo (8 juegos)', 'FAND_Test_Orientativo.html', 'Apoyos', 'test orientativo juegos evaluación orientación edad cribado atención memoria planificación'],
        ['Fichas técnicas de los juegos (profesionales)', 'FAND_Fichas_Tecnicas.html', 'Apoyos', 'fichas técnicas J01 J02 J03 J04 J05 J06 J07 J08 profesionales indicadores protocolo'],
        ['Mi ficha de orientación', 'FAND_Ficha_Usuario.html', 'Apoyos', 'ficha usuario perfil resultados orientación informe profesional neurodivergencia'],
        ['Formaciones oficiales', 'FAND_Formaciones_Oficiales.html', 'Formación', 'estudios máster universidades idiomas becas europa'],
        ['Cuestionarios por edades y perfiles', 'FAND_Cuestionarios_Edades_Perfiles.html', 'Experiencias', 'cuestionarios edades perfiles experiencias'],
        ['Población neurodivergente', 'articulos/poblacion-neurodivergente.html', 'Artículo', 'población datos cifras prevalencia estudio'],
        ['Neurodivergencia y redes sociales', 'articulos/neurodivergencia-redes-sociales.html', 'Artículo', 'redes sociales internet estudio comunicación'],
        ['Inclusión laboral 2026', 'FAND_Neurodivergencia_Inclusion_Laboral_2026.html', 'Artículo', 'empleo trabajo inclusión laboral programas'],
        ['Proyecto inicial de FAND (PDF)', 'FAND_Proyecto_Inicial_Actualizado.pdf', 'PDF', 'proyecto presentación fundación pilares'],
        ['Informe de población neurodivergente (PDF)', 'FAND_Poblacion_Neurodivergente_ACTUALIZADO_2026.pdf', 'PDF', 'población informe datos'],
        ['Inclusión laboral 2026 (PDF)', 'FAND_Neurodivergencia_Inclusion_Laboral_2026_MARCA_AGUA.pdf', 'PDF', 'empleo trabajo informe'],
        ['Programas de empleo neurodivergente (PDF)', 'FAND_Directorio_Programas_Empleo_Neurodivergente_2026.pdf', 'PDF', 'empleo programas directorio'],
        ['Estudio sobre redes sociales (PDF)', 'FAND_Estudio_Neurodivergencia_Redes_Sociales_EXHAUSTIVO_2026.pdf', 'PDF', 'redes sociales estudio'],
        ['Investigación sobre juegos (PDF)', 'FAND_Investigacion_Juegos_Neurodivergencia.pdf', 'PDF', 'juegos investigación evaluación cognitiva'],
        ['Proyecto de app de orientación (PDF)', 'FAND_Proyecto_App_Orientacion_Recursos_Comunidad.pdf', 'PDF', 'app orientación recursos comunidad'],
    ];

    public static function find(string $route): ?array
    {
        return self::PAGES[$route] ?? null;
    }

    public static function searchIndex(): array
    {
        return array_map(
            static fn (array $item): array => [
                'title' => $item[0],
                'url' => $item[1],
                'type' => $item[2],
                'keywords' => $item[3],
            ],
            self::SEARCH_INDEX
        );
    }
}
