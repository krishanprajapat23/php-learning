<?php

namespace Core;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function addRoutesArr($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method'=> $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller) {
       return $this->addRoutesArr('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
       return $this-> addRoutesArr('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
       return $this-> addRoutesArr('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {
       return $this-> addRoutesArr('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {
       return $this-> addRoutesArr('DELETE', $uri, $controller);
    }

    public function only($key) {
        return $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method) {
        // get the method passed in fn and then uppercase it like put will be >>> PUT
        $method = strtoupper($method);

        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method) {
                // apply the middleware [middlware is the bridge between the req to the core of the app]
                Middleware::resolve($route['middleware']);

                return require base_path("Http/controllers/{$route['controller']}");
            }
        }

        // if none found then abort 
        $this->abort();
    }

    protected function abort($code = 404) {

        http_response_code($code);
        require base_path("views/{$code}.php");

        die();
    }

};



