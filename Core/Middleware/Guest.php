<?php

namespace Core\Middleware;

class Guest {
    public function handle() {
        
        // alternative to below->>> isset($_SESSION['user']) ? $_SESSION['user'] : false;
        if($_SESSION['user'] ?? false) {
            header('location: ./');
            exit();
        }
    }   
}