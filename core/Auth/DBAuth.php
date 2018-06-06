<?php

namespace Core\Auth;


use App\App;
use Core\Database\Database;
use Core\Session\Session;

class DBAuth {

	private $db;

	public function __construct(Database $db) {
		$this->db = $db;
	}

	/**
	 * @return id de l'utilisateur si logged
	 * @return bool
	 */
	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	 * @param $username
	 * @param $password
	 * @return bool
	 */
	public function login($username, $password){
		$user = $this->db->prepare("SELECT * FROM users WHERE username = ?", [$username], true);
		if($user){
			 if( password_verify($password, $user->password) && !is_null($user->confirmed_at) ){
				Session::getInstance()->write('auth', $user);
				return true;
			 }
		}
		return false;
	}

	/**
	 * @return mixed
	 */
	public function logged(){
		Session::getInstance()->read('auth');
	}
	
	public function userRole(){
		if( isset($_SESSION['auth']) ){
			return Session::getInstance()->read('auth')->role;
		}
		return false;
	}

}