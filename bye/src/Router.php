<?php

class Router {
    private array $routes = [];
    public function add(string $route, array $handler): void {
        $this->routes[$route] = $handler;
    }
    public function dispatch(string $uri): void {
        $uri = urldecode($uri);

        $uri = explode('?', $uri)[0];

        foreach ($this->routes as $route => $handler) {
            $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_а-яА-ЯёЁ\s]+)', $route);
            
            $routePattern = '#^' . $routePattern . '$#u'; 

            if (preg_match($routePattern, $uri, $matches)) {
                [$controllerClass, $action] = $handler;
                
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $controller = new $controllerClass();
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 - Страница не найдена";
    }
}