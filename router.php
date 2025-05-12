<?php

$routes = require "routes.php";

function routeToController($uri, $routes) {
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}


// get the current URL path
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$base = '/php-learning';
$uri = str_replace($base, '', $uri); // Now $uri is like "/about"


routeToController($uri, $routes);


function abort($code = 404) {

    http_response_code($code);
    require "views/{$code}.php";

    die();
}