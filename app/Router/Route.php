<?php
namespace App\Router;
/**
 * Class Route
 */
class Route {

	/**
	 * @var string -> le chemin ex: home, post/:id ...
	 */
	private $path;
	/**
	 * @var string -> le nom du controller posts.index, users.register ...
	 */
	private $callable; //closure(Controller)
	/**
	 * @var array -> id du $path
	 */
	private $matches = [];

	public function __construct($path, $callable){
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	public function match($url){
		$url = trim($url, '/');
		$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path); //expression regulière pour recup id ||| post/:id devient post/([^/]+)
		$regex = "#^$path$#";
		if(!preg_match($regex, $url, $matches)){
			return false;
		}
		array_shift($matches); // supp le première elt (post/) et recup :id
		$this->matches = $matches;
		return true;
	}

	public function call(){
		$params = explode('.', $this->callable);
		$nameCtrl = $params[0];
		$actionCtrl = $params[1];
		$controller = PATH_PUBLIC . $nameCtrl . "Controller";
		$controller = new $controller();
		return call_user_func_array([$controller, $actionCtrl], $this->matches);
	}

	public function getUrl($params){
		$path = $this->path;
		foreach($params as $k => $v){
			$path = str_replace(":$k", $v, $path);
		}
		return $path;
	}
}