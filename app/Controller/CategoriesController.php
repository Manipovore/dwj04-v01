<?php

namespace App\Controller;

class CategoriesController extends AppController {

    public function index(){
        $content =  'Controller: Index Category';
        $this->render('categories.index', compact('content'));
    }

    public function category($slug){
        $content =  'Controller: Method category and Slug is ' . $slug;
        $this->render('categories.category', compact('content'));
    }

}