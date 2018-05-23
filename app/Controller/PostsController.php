<?php
namespace App\Controller;

class PostsController {

    public function index() {
        echo 'Controller: Index Posts';
    }

    public function show($slugCategory, $slug, $id) {
        echo 'Controller: Show Posts and category is ' . $slugCategory . ' , slug ' . $slug . ' and id ' . $id;
    }
}