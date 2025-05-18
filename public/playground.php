<?php 

use Illuminate\Support\Collection;

const BASE_PATH = __DIR__ . '/../';

// now with composer we can use autoload like this
require BASE_PATH . 'Core/function.php';
require BASE_PATH . 'vendor/autoload.php';

$num = new Collection([
    1, 2, 4, 5, 6, 7, 8, 9
]);

if($num->contains(1)) {
    dd('it contain ten');
}
dd('it does not contains ten');