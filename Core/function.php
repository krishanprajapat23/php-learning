<?php

use Core\Response;
use Core\Session;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
  }
  // dd($_SERVER['REQUEST_URI']);
  
  
function isCurrURL($url) {
  return $_SERVER['REQUEST_URI'] === $url;
}


function authorize($condition, $statusCode = Response::FORBIDDEN){
  if(!$condition) {
    return abort($statusCode);
  }
}

function abort($code = 404) {
  http_response_code($code);
  require base_path("views/{$code}.php");
  
  die();
}


// fn for getting base path
function base_path($path) {
  return BASE_PATH . $path;
}

function view($path, $attrs = []) {
  extract($attrs);
  require base_path('views/' . $path);
}


function redirect($path) {
  header("location: {$path}");
  exit();
}

// get the old value from a form after a page refresh
function old($key, $default = '') {
  return Session::get('old')[$key] ?? $default;
}

//get the current user id from session
function userId() {
    return $_SESSION['user']['id'] ?? false;
}