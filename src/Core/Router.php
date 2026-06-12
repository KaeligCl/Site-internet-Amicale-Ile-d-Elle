<?php

namespace App\Core;

use Twig\Environment;

class Router
{
    private array $routes = [];

    public function __construct(private Environment $twig)
    {
    }

    public function get(string $path, string $template): void
    {
        $this->routes[$path] = $template;
    }

    public function dispatch(string $requestUri): string
    {
        $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/') ?: '/';

        if (!array_key_exists($path, $this->routes)) {
            http_response_code(404);

            return $this->twig->render('404.html.twig', [
                'currentRoute' => null,
            ]);
        }

        return $this->twig->render($this->routes[$path], [
            'currentRoute' => $path,
        ]);
    }
}
