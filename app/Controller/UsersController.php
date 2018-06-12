<?php

namespace App\Controller;

use Core\Auth\Validator;
use Core\Session\Session;
use Core\HTTP\Url;

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
				Url::redirect('home');
			}else{
				$errors = true;
			}
		}
		$form = new \Core\HTML\BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'errors'));
	}

	public function register(){
		$errors = false;

		if(!empty($_POST)){
			$validator = new Validator($_POST);

			$validator->isAlpha('username', "Votre pseudo n'est pas valide! il doit contenir uniquement: lettres, chiffres et undescore(_).");
			$validator->isUniq('username', \App\App::getInstance()->getDb(), 'users',"Ce pseudo est déjà utilisé !");
			$validator->isEmail('email', "Email invalide");
			$validator->isUniq('email', \App\App::getInstance()->getDb(), 'users',"Cette Email est déjà utilisé !");
			$validator->isConfirmed('password', "Le mot de passe doit être identique.");

			if($validator->isValid()){
				$auth = new \Core\Auth\DBAuth(\App\App::getInstance()->getDb());
				if($auth->register($_POST['username'], $_POST['password'], $_POST['email'])){
					Session::getInstance()->setFlash('success', 'Veuillez confirmer votre compte via l\'email de confirmation qui vous a été envoyé.');
					Url::redirect('login');
				}else{
					Session::getInstance()->setFlash('danger', 'Une erreur est survenue !!!');
				}
			}else{
				$errors = $validator->getErrors();
			}
		}
		$form = new \Core\HTML\BootstrapForm($_POST);
		$this->render('users.register', compact('form', 'errors'));
	}

	public function confirm($id, $token){
		$errors = false;
		$auth = new \Core\Auth\DBAuth(\App\App::getInstance()->getDb());
		if($auth->confirm($id, $token)){
			Session::getInstance()->setFlash('success', 'Votre compte est confirmé, vous êtes maintenant connecté !!!');
			Url::redirect('home');
		}else{
			$errors = true;
		}
		$form = new \Core\HTML\BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'errors'));
	}

	public function logout(){
		Session::getInstance()->setFlash('info', 'Vous êtes maintenant déconnecté !!!');
		Session::getInstance()->delete('auth');
		Url::redirect("home");
	}

	public function account(){
		$user_id = Session::getInstance()->read('auth')->id;
		var_dump($user_id);
		$user = $this->User->findUser($user_id);
		$this->render('users.account', compact('user'));
	}
}