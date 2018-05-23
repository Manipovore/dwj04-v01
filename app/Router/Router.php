<?php

namespace App\Router;

/**
 * Class Router
 */
class Router {

	private $url;
	private $routes = [];
	private $namedRoutes = [];

	public function __construct($url){
		$this->url = $url;
	}

	public function init($file){
		foreach( $file as $mth => $rtes){
			foreach($rtes as $rte){
				$route = new Route($rte->path, $rte->callable);
				$this->routes[$mth][] = $route;
			}
		}
		$this->run();
	}

	/**
	 * $_SERVER -> recup la method
	 */
	public function run(){
		if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
			RouterException::message('REQUEST_METHOD DOES NOT EXIST');
		}
		foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
			if($route->match($this->url)){
				return $route->call();
			}
		}
		 RouterException::message('no routes matches');
	}

	public function url($name, $params = []){
		if(!isset($this->namedRoutes[$name])){
			RouterException::message('No route matches this name');
		}
		return $this->namedRoutes[$name]->getUrl($params);
	}
}