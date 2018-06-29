<?php

namespace Core\HTTP;

/**
 * Class Url
 * @package Core\HTTP
 *
 * Gère les Urls, traitement spécifique, redirection ...
 */
class Url {

	/**
	 * @var string ex: localhost
	 */
	private static $host;
	/**
	 * @var string ex: /sous-dosier ...
	 */
	private static $uri;
	/**
	 * @var string host + uri
	 */
	private static $url;
	/**
	 * @var string http or https
	 */
	public static $http_mode;


	/**
	 * @return string HTTP
	 */
	public static function getHttp_mode(){
        if( is_null(self::$http_mode) ){
            self::$http_mode = $_SERVER["REQUEST_SCHEME"] . "://";
        }
		return self::$http_mode;
	}

	/**
	 * GETTER
	 * @return string ex:Localhost
	 */
	public static function getHost(){
		if( is_null(self::$host) ){
			self::$host =  $_SERVER['HTTP_HOST'];
		}
		return self::$host;
	}

	/**
	 * GETTER
	 * @return string ex: dwj04
	 */
	public static function getUri(){
		if( is_null(self::$uri) ){
			self::$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		}
		return self::$uri;
	}

	/**
	 * GETTER
	 * @return string
	 */
	public static function getUrl(){
		if( is_null(self::$url) ){
			$http = self::getHttp_mode();
			$host = self::getHost();
			$uri = self::getUri();
			self::$url = "$http$host$uri";
		}
		return self::$url;
	}

	/**
	 * Recupère les paramètres numérique d'une url
	 * @return int
	 */
	public static function getId(){
		$params = $_SERVER["QUERY_STRING"];
		$params = trim($params, '/');
		$path = preg_replace('#[^0-9]#', '$1', $params); //expression regulière pour recup id ||| post/:id devient post/([^/]+)
		return $path;
	}


	public static function getParams($arg, $limit){
		$path = self::getId();
		$result = intval( $path +$arg );
		if($result <= 1){
			return 1;
		}
		if($result == $limit){
			var_dump($path);
			return intval($path);
		}
		return $result;
	}

	/**
	 * @param $path string chemin pour la redirection
	 */
	public static function redirect($path){
		$url = self::getUrl();
		header("Location: $url/$path");
		exit;
	}

	/**
	 * @param $getPage
	 * @return string
	 *
	 * Non utilisé pour le projet
	 */
	public static function breadcrumb($getPage){
		$filtre = strip_tags($getPage);
		$tab = explode('/', $filtre);
		$nbrArgs = count($tab);
		$home = ' <li class="breadcrumb-item"><a href="' . self::getUrl() . '">Accueil</a></li>';
		if(!empty($tab[0])){
			if($nbrArgs === 1 && $tab[0] != 'home'){
				$linkChapter = '<li class="breadcrumb-item active" aria-current="page">' . $tab[0]. '</li>';
				return $home .  $linkChapter;
			}
			if($nbrArgs > 1 && !empty($tab[1])){
				$linkChapter = '<li class="breadcrumb-item"><a href="'.self::getUrl().'/'.$tab[0].'/">' . $tab[0]. '</a></li>';
				$linkPost = '<li class="breadcrumb-item active" aria-current="page">'.$tab[1].'</li>';
				return $home .  $linkChapter . $linkPost;
			}
		}
		return $home;
	}

}