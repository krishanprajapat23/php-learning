<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    $container = new Container();

    $container->bind('Foo', function () {
        return 'Bar';
    });

    $result = $container->resolve('Foo');

    expect($result)->toEqual('Bar');
});
