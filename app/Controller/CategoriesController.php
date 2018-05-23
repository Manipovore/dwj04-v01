<?php

namespace App\Controller;

class CategoriesController {

    public function index(){
        echo 'Controller: Index Category';
    }

    public function category($slug){
        echo 'Controller: Method category and Slug is ' . $slug;
    }

}