<?php

namespace App\Controller\Admin;
use App;
use Core\Auth\DBAuth;
use Core\HTTP\Url;
use Core\Session\Session;

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
			Session::getInstance()->setFlash('danger', 'Accés interdit !');
			Url::redirect("home");
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