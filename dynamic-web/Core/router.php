<?php

$routes = require base_path("routes.php");

//handles the routes
function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

//abort function
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}

// Get the URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//calling the function to handling routes
routeToController($uri, $routes);
