<?php

namespace App\Controller;
use App\Model\ModelPosts;

class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index() {
        $posts = $this->Post->last();
        $categories = $this->Category->all("categories");
        $this->noResult($posts);
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function show($slugCategory, $slug, $id) {
        $post = $this->Post->findWithCategory($slug);
        $categories = $this->Category->all("categories");
        $this->noResult($post);
        $this->render('posts.show', compact('post', 'categories'));
    }
}