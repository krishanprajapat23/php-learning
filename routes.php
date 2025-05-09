<?php

// get the current URL path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$base = '/php-learning';
$uri = str_replace($base, '', $uri); // Now $uri is like "/about"

// define routes
$routes = [
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/about' => 'controllers/about.php',
];

function routeToController($uri, $routes) {
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}


routeToController($uri, $routes);

function abort($code = 404) {

    http_response_code($code);
    require 'views/404.php';

    die();
}