<?php

namespace App\Router;

use \Exception;

class RouterException extends Exception{

    public static function message($message) {
        throw new RouterException($message);
    }
}