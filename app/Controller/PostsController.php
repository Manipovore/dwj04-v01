<?php

namespace App\Controller;

class PostsController extends AppController{

    public function index() {
        $content =  'Controller: Index Posts';
        $this->render('posts.index', compact('content'));
    }

    public function show($slugCategory, $slug, $id) {
        $content = 'Controller: Show Posts and category is ' . $slugCategory . ' , slug ' . $slug . ' and id ' . $id;
        $this->render('posts.show', compact('content'));
    }
}