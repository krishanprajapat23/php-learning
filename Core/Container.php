<?php

namespace Core;

class Container {
    protected $bindings = [];

    // kind of Add method which will add the key and the fn inside $bindigs arr[];
    public function bind($key, $resolver) {
        $this->bindings[$key] = $resolver;
    }


    public function resolve($key) {
        //given resolve key is not found in the arr then throw the error
        if(!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }    
        
        // otherwise call the fn inside arr[]
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }

}