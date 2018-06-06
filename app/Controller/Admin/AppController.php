<?php

namespace App\Controller\Admin;
use \App;
use Core\Auth\DBAuth;

class AppController extends App\Controller\AppController {

	/**
	 * @var string Views/templates/ADMIN
	 */
	protected $template = "admin";

	public function __construct() {
		parent::__construct();

		$app = App\App::getInstance();
		$auth = new DBAuth($app->getDb());
		if($auth->userRole() != "admin" && $auth->userRole() != "author"){
			$this->forbidden();
		}

		$this->loadModel('Post');
		$this->loadModel('Category');
	}

	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		$this->render('admin.index', compact('posts', 'categories'));
	}

}