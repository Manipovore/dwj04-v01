<?php

namespace App\Controller;

class CategoriesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        var_dump("ok");
        $categories = $this->Category->all("categories");
        $this->render('categories.index', compact('categories'));
    }

    public function category($slug){
        $categorie = $this->Category->findWithSlug($slug);
        $posts = $this->Post->lastByCategory($categorie->id);
        $categories = $this->Category->all("categories");
        $this->render('categories.category', compact('posts', 'categories', 'categorie'));
    }

}