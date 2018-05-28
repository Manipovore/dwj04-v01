<?php

namespace App\Controller;
use App\Model\ModelPosts;

class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index() {
        $posts = $this->Post->last();
        $this->render('posts.index', compact('posts'));
    }

    public function show($slugCategory, $slug, $id) {
        $post = $this->Post->findWithCategory($slug);
        $this->render('posts.show', compact('post'));
    }
}