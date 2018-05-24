<?php

namespace App\Controller;


class Controller {

    protected $viewPath = ROOT . "app/Views/";
    protected $template = "default";

    /**
     * @param $view fichier de la vue
     * @param $variables Array : Scope-> on recup les variables pour les passer à la vue
     */
    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require( $this->viewPath . str_replace('.', '/', $view ). '.php' );
        $content = ob_get_clean();
        require( $this->viewPath . 'templates/' . $this->template . '.php' );

    }

}