<?php 

session_start();

use Core\Response;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';


//this fn will autoload asa the browser loads the page...
spl_autoload_register(function ($class){
    
    $class = str_replace('\\',DIRECTORY_SEPARATOR, $class);
    //with namespace
    
    require base_path("{$class}.php");
    
    
    // without namespace 
    // require base_path("Core/{$Class}.php");    
});

require base_path('bootstrap.php');



$router = new \Core\Router();

$routes = require base_path("routes.php");

// get the current URI
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$baseFolder = '/php-learning';
$uri = str_replace($baseFolder, '', $uri); // Now $uri is like "/about"


// get the req method type (if any post req contains specific user built like _method then do that otherwise the server one method)
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {
    // controller will load the view
    $router->route($uri, $method);
} catch (ValidationException $exception) {

    // dd($_SERVER);
    
    // set the flash key value in session part of [PRG]
    Session::flash('errors', $exception->getErrors());

    // set the email in session for to get the form field the value when refreshed
    Session::flash('old', $exception->getOld());

    return redirect($router->prevUrl());
}

// clear the flash key in session
Session::unflash();