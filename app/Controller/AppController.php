<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Session\Session;

class AppController extends Controller {

    /**
     * @var \DateTime
     */
    protected $template = "default";
    protected $viewPath;

    public function __construct() {
        $this->viewPath = ROOT . 'app/Views/';
        Session::getinstance();
        var_dump(Session::getinstance()->read("auth"));
    }

    protected function noResult($result){
        if($result == false){
            $this->notFound();
        }
    }

    protected function loadModel($model_name){
        $this->$model_name = \App\App::getInstance()->getModel($model_name);
    }
}