<?php 

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';


//this fn will autoload asa the browser loads the page...
spl_autoload_register(function ($Class){
    require base_path("Core/{$Class}.php");
    
});

require base_path('Core/router.php');