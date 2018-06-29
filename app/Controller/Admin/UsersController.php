<?php

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;
use Core\HTTP\Url;

class UsersController extends AppController{

	public function __construct() {
		parent::__construct();
		$this->loadModel('User');
	}

	public function index(){
		$users = $this->User->all();
		$this->render('admin.users.index', compact('users'));
	}

	public function add(){
		if(!empty($_POST)){
			$result = $this->User->create([
				'username' => htmlentities($_POST['username']),
				'role' => $_POST['role'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
				'confirmed_at' => $this->date,
			]);

			if($result){
				Url::redirect('admin/users');
				return $this->index();
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('admin.users.edit', compact('form'));
	}

	public function edit($id){
		if(!empty($_POST)){
			$result = $this->User->update($id,[
				'username' => htmlentities($_POST['username']),
				'role' => $_POST['role'],
				'email' => $_POST['email'],
				'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
				'confirmed_at' => $this->date,
			]);
			if($result){
				Url::redirect('admin/users');
			}
		}
		$user = $this->User->findUser($id);
		$form = new BootstrapForm($user);
		$this->render('admin.users.edit', compact('user', 'form'));
	}

	/**
	 * @param $id
	 * Axe d'amélioration token csrf
	 */
	public function delete($id){
		if(!empty($_POST)){
			$this->User->delete(intval($id));
			Url::redirect('admin/users');
		}
	}
}