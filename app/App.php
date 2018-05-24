<?php

namespace App;

class App{

    private static $_instance;
    private static $_routes;

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
        self::initRoutes();
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
}