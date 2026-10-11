<?php
declare(strict_types=1);

final class PageController
{
    public static function show(string $requestUri): void
    {
        $route = self::routeFromRequest($requestUri);

        if ($route === 'index.php') {
            header('Location: index.html', true, 302);
            return;
        }

        $page = PageCatalog::find($route);
        if ($page === null) {
            self::notFound();
            return;
        }

        $pro = ProController::prepare($route, $page);
        if ($pro === null) {
            return;
        }

        $viewPath = dirname(__DIR__) . '/Views/pages/' . $page['view'];
        if (!is_file($viewPath)) {
            error_log('MVC page view not found: ' . $page['view']);
            http_response_code(500);
            echo 'No se pudo cargar esta página.';
            return;
        }

        header('Content-Type: text/html; charset=UTF-8');
        require $viewPath;
    }

    private static function routeFromRequest(string $requestUri): string
    {
        $path = parse_url($requestUri, PHP_URL_PATH);
        if (!is_string($path)) {
            return '';
        }

        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
        $basePath = rtrim(dirname($scriptName), '/.');
        if ($basePath !== '' && str_starts_with($path, $basePath . '/')) {
            $path = substr($path, strlen($basePath));
        }

        $route = ltrim(rawurldecode($path), '/');
        return $route === '' ? 'index.html' : $route;
    }

    private static function notFound(): void
    {
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
        $basePath = rtrim(dirname($scriptName), '/.');
        $homeUrl = ($basePath === '' ? '' : $basePath) . '/index.html';

        http_response_code(404);
        header('Content-Type: text/html; charset=UTF-8');
        require dirname(__DIR__) . '/Views/errors/404.php';
    }
}
