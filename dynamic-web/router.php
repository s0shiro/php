<?php

// Trim `/php/dynamic-web` from the URI
$uri = parse_url(str_replace('/php/dynamic-web', '', $_SERVER['REQUEST_URI']))['path'];

//routes
$routes = array("/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php",
    "/contact" => "controllers/contact.php"
);

//handles the routes
function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

//abort function
function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.view.php";
    die();
}

//calling the function to handling routes
routeToController($uri, $routes);
