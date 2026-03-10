<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Routeur minimaliste basé sur l'URI et la méthode HTTP.
 *
 * Il compare l'URL courante à des patterns avec paramètres dynamiques (:id)
 * et dispatche vers le bon contrôleur/méthode.
 */
final class Router
{
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        $this->routes["GET {$path}"] = $action;
    }

    public function post(string $path, array $action): void
    {
        $this->routes["POST {$path}"] = $action;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri    = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route => $action) {
            [$routeMethod, $routePath] = explode(' ', $route, 2);

            if ($routeMethod !== $method) {
                continue;
            }

            // On convertit les segments ":id" en groupes de capture regex.
            // "/tasks/edit/:id" devient le pattern "#^/tasks/edit/([^/]+)$#"
            $pattern = preg_replace('#:([a-zA-Z]+)#', '([^/]+)', $routePath);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Retire le match complet, garde les captures

                [$controllerClass, $methodName] = $action;
                $controller = new $controllerClass();
                $controller->$methodName(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo '<h1>404 — Page introuvable</h1>';
    }
}
