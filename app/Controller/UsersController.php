<?php

namespace App\Controller;

use App\App;
use Core\Session\Session;

class UsersController extends AppController{

	public function __construct() {
		parent::__construct();
		$this->loadModel('User');
	}

	public function login(){
		$errors = false;
		if(!empty($_POST)){
			$auth = new \Core\Auth\DBAuth(\App\App::getInstance()->getDb());
			if($auth->login($_POST['username'], $_POST['password'])){
				Session::getInstance()->setFlash('info', 'Vous êtes connecté !!!');
				//redirection
				header('Location: http://localhost/dwj04-v01/admin');
			}else{
				$errors = true;
			}
		}

		$form = new \Core\HTML\BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'errors'));
	}

	public function logout(){
		Session::getInstance()->setFlash('info', 'Vous êtes maintenant déconnecté !!!');
		Session::getInstance()->delete('auth');
		header('Location: http://localhost/dwj04-v01/');
	}
}