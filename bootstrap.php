<?php

use Core\App;
use Core\Container;
use Core\Database;


$container = new Container();


// this is first bindings to the container class
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);

// dd($db);