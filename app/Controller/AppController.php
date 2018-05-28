<?php

namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller {

    /**
     * @var \DateTime
     */
    protected $template = "default";
    protected $viewPath;

    public function __construct() {
        $this->viewPath = ROOT . 'app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = \App\App::getInstance()->getModel($model_name);
    }
}