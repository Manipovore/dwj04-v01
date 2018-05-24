<?php

namespace App\Router;

/**
 * Class Router
 */
class Router {

	/**
	 * @var String
	 * Url
	 */
	private $url;
	/**
	 * @var array[String Request_Method][Object Route]
	 * Tableau qui liste les methodes (GET, POST ...) puis les Routes definis par l'Objet Route.
	 * Exemple: array (size=2)
		'GET' =>
			array (size=6)
				0 =>
					object(App\Router\Route)[12]
						private 'path' => string 'posts' (length=0)
						private 'callable' => string 'posts.index' (length=11)
						private 'matches' =>
							array (size=0)
								...
				1 => ..
	 * 	...
	 */
	private $routes = [];

	/**
	 * Router constructor.
	 * @param $url String
	 */
	public function __construct($url){
		$this->url = $url;
	}

	/**
	 * @param $file
	 */
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
}