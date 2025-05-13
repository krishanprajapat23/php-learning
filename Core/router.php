<?php

namespace Core;

class Router {
    protected $routes = [];

    public function addRoutesArr($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method'=> $method
        ];
    }

    public function get($uri, $controller) {
        $this->addRoutesArr('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this-> addRoutesArr('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
        $this-> addRoutesArr('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {
        $this-> addRoutesArr('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this-> addRoutesArr('DELETE', $uri, $controller);
    }

    public function route($uri, $method) {
        // get the method passed in fn and then uppercase it like put will be >>> PUT
        $method = strtoupper($method);

        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method) {
                return require base_path($route['controller']);
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



