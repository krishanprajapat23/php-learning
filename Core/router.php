<?php

$routes = require base_path("routes.php");

function routeToController($uri, $routes) {
    if(array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}


// get the current URL path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$baseFolder = '/php-learning';
$uri = str_replace($baseFolder, '', $uri); // Now $uri is like "/about"


routeToController($uri, $routes);


function abort($code = 404) {

    http_response_code($code);
    require base_path("views/{$code}.php");

    die();
}