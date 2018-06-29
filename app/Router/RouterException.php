<?php

namespace App\Router;

use App\Controller;
use \Exception;

class RouterException extends Exception{

    public static function message($message) {
        if( MODE === 'DEV'){
            throw new RouterException($message);
        }else{
            $controller = new Controller\AppController();
            $controller->notFound();
        }

    }
}