<?php

namespace App;

use Core\Database\MysqlDatabase;
use Core\Session\Session;

class App{

    private static $_instance;
    private static $_routes;
    private $db_instance;
    private $site_instance;

    /**
     * Design pattern Singleton
     * @return App()
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * Init APP
     */
    public static function load(){
        require ROOT . 'app/Autoloader.php';
        Autoloader::register();
        require ROOT . 'core/Autoloader.php';
        \Core\Autoloader::register();
        self::initRoutes();
        self::getUrl(); //For test, delete this
        Session::getInstance();
    }

    /**
     * Design pattern Singleton
     * @return Router\Router()
     */
    public static function initRoutes(){
        if (is_null(self::$_routes)) {
            $fileJSON = file_get_contents(ROOT . "app/Router/routes.json");
            $file = json_decode($fileJSON);
            self::$_routes = $file;
        }
        $router = new Router\Router($_GET['url']);
        $router->init(self::$_routes);
    }

    public static function getUrl(){
        $url = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return $url;
    }

    /**
     * Design pattern FACTORY
     * Connexion database
     * new MysqlDatabase($db_name, $db_user, $db_pass, $db_host);
     */
    public function getDb(){
        if( is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase("blog", "root", "", "localhost");
        }
        return $this->db_instance;
    }

    /**
     * Design pattern FACTORY
     * Chargement des classes Model
     */
    public function getModel($name){
        $class_name = 'App\\Model\\'.ucfirst($name). 'Model';
        return new $class_name($this->getDb());
    }

    /**
     * Design pattern FACTORY
     * Config du site
     */
    public function getConfigSite(){
        if( is_null($this->site_instance)){
            $this->site_instance = [
                "siteName" =>"DWJ04",
                "siteUrl" =>"http://localhost/dwj04/",
                "siteEmail" =>"manipovoredev@gmail.com",
                "siteAuthor" =>"Jean Forteroche",
            ];
        }
        return $this->site_instance;
    }
}