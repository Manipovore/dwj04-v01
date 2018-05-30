<?php

namespace App\Controller;

class CategoriesController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $categories = $this->Category->all("categories");
        $this->noResult($categories);
        $this->render('categories.index', compact('categories'));
    }

    public function category($slug){
        $categorie = $this->Category->findWithSlug($slug);
        $this->noResult($categorie);
        $posts = $this->Post->lastByCategory($categorie->id);
        $categories = $this->Category->all("categories");
        $this->render('categories.category', compact('posts', 'categories', 'categorie'));
    }

}