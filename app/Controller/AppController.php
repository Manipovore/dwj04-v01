<?php

namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller {

    /**
     * @var \DateTime
     */
    protected $date;
    protected $template = "default";
    protected $viewPath;

    public function __construct() {
        $date = new \DateTime();
        $this->date = $date->format('Y-m-d H:i:s');
        $this->viewPath = ROOT . 'app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = \App\App::getInstance()->getTable($model_name);
    }
}