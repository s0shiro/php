<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        // Get the last route added to the routes array
        $lastRouteIndex = array_key_last($this->routes);

        // Set the middleware for the last route
        $this->routes[$lastRouteIndex]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        $method = $_POST['_method'] ?? $method;

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

//                //applying manual middleware
//                if ($route['middleware'] === 'guest') {
//                    (new Guest)->handle();
//                }
//
//                if ($route['middleware'] === 'auth') {
//                    (new Auth)->handle();
//                }

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    //abort function
    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.view.php");
        die();
    }


}


