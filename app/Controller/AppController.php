<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Session\Session;

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
        $this->viewPath = ROOT . 'app'.DS.'Views'.DS;
        Session::getInstance();
        
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