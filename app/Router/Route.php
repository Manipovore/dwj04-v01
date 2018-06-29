<?php
namespace App\Router;
/**
 * Class Route
 */
class Route {

	/**
	 * @var String
	 * Le chemin, home, post/:id ...
	 */
	private $path;
	/**
	 * @var String
	 * Le nom du controlleur posts.index, categories.index ...
	 */
	private $callable; //closure(Controller)
	/**
	 * @var array
	 * élément de l'url
	 * exemple avec url -> /category/titredupost/iddelarticle1
	 * array (size=3)
	 *		0 => string 'category' (length=8)
	 *		1 => string 'titredupost' (length=11)
	 *		2 => string 'iddelarticle1' (length=13)
	 */
	private $matches = [];

	/**
	 * Route constructor.
	 * @param $path
	 * @param $callable
	 */
	public function __construct($path, $callable){
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	/**
	 * match() Methode qui traite la correspondance avec l'url et le listing des routes (routes.json)
	 * Stock les éléments de l'url dans un array matches
	 * @param $url
	 * @return bool
	 */
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

	/**
	 * Call() Methode qui appelle le ctrl correspondant
	 * @return mixed / Controller
	 */
	public function call(){
		$params = explode('.', $this->callable);
		if($params['0'] === 'admin'){
			$nameCtrl = $params[1];
			$actionCtrl = $params[2];
			$controller = PATH_ADMIN . ucfirst($nameCtrl) . "Controller";
		}else{
			$nameCtrl = $params[0];
			$actionCtrl = $params[1];
			$controller = PATH_PUBLIC . ucfirst($nameCtrl) . "Controller";
		}
		$controller = new $controller();
		return call_user_func_array([$controller, $actionCtrl], $this->matches);
	}
}