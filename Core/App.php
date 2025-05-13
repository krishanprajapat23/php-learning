<?php

namespace Core;

class App {
    protected static $container;

    // this fn receive container obj and it set it to the static container inside this class
    public static function setContainer($container) {
       static::$container = $container;
    }

    public static function container() { 
        return static::$container;
    }

    public static function bind($key, $resolver) {
       return static::$container->bind($key, $resolver);
    }

    public static function resolve($key) {
       return static::$container->resolve($key);
    }
}