<?php

namespace Core\Auth;


use App\App;
use Core\Database\Database;
use Core\HTML\Mail;
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

	public function getToken(){
		return bin2hex(openssl_random_pseudo_bytes(30));
	}

	public function register($username, $password, $email){
		$password = password_hash($password, PASSWORD_BCRYPT);
		$token = $this->getToken();
		$this->db->prepare("INSERT INTO users SET username = ?, role = 'user', email = ?, password = ?, confirm_token = ?", [
			$username,
			$email,
			$password,
			$token
		], null, true);
		$user_id = $this->db->lastInsertId();

		$config = App::getInstance()->getConfigSite();
		$mail = new Mail($email, 'Confirmation du compte','manipovoredev@gmail.com');
		$mail->subject('Confirmation de votre compte sur ' . $config['siteName']);
		$mail->message('h1', 'Confirmez votre compte');
		$mail->message('p', 'Afin de valider votre compte sur '. $config['siteName'] .' merci de bien vouloir cliquer sur le boutton suivant: ');
		$mail->message('a href=' . $config['siteUrl'] . "/confirm/$user_id/$token" . ' ', 'Confirmation');
		$mail->sendMail();

		return true;
	}

	public function confirm($user_id, $token){
		$user = $this->db->prepare("SELECT * FROM users WHERE id = ?", [$user_id], null, true);
		if($user && $user->confirm_token == $token){
			$this->db->prepare("UPDATE users SET confirm_token = NULL, confirmed_at = NOW() WHERE id = ?", [$user_id], null, true);
			Session::getInstance()->write('auth', $user);
			return true;
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