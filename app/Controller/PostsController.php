<?php

namespace App\Controller;
use Core\Session\Session;
use Core\HTML\BootstrapForm;
use Core\HTTP\Url;

class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function index() {
        $posts = $this->Post->last();
        $categories = $this->Category->all("categories");
        $this->noResult($posts);
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function allPosts($page) {
        $posts = $this->Post->allPosts(intval($page));
        $allPosts = $this->Post->all();
        $nbrPosts = count($allPosts);
        $pagination = $this->pagination($nbrPosts);
        $prev = Url::getParams(-1, $nbrPosts);
        $next = Url::getParams(1, $nbrPosts);
        $currentNav = Url::getId();
        $categories = $this->Category->all("categories");
        $this->noResult($posts);
        $this->render('posts.all', compact('posts', 'categories', 'pagination', 'prev', 'next', 'currentNav'));

    }

    public function pagination($nbrPosts){
        //10 correspond aux nombre de posts par page
        //nbr de page
        $nbrPages = ceil($nbrPosts / 10);
        return intval($nbrPages);
    }

    public function paginationPage($post_id){
        $url = Url::getUrl();
        $posts = $this->Post->old();
        $tab = [];
        $i = 0;
        foreach($posts as $post){
            $i++;
            $target = $url .'/'.$post->category_slug.'/'.$post->slug.'/'.$post->page;
            if($i != $post_id){
                $tab[$i] = '<li class="page-item"><a class="page-link" href="'.$target.'">'.$i.'</a></li>';
            }else{
                $tab[$i] = '<li id="pagination-active" class="page-item disabled" data-id="'.$post->id.'"><a class="page-link" href="'.$target.'">'.$post->page.'</a></li>';
            }
        }
        return $tab;
    }

    public function show($slugCategory, $slug, $id) {
        $pagination = $this->paginationPage($id);
        $post = $this->Post->findWithCategory($slug);
        $categories = $this->Category->all("categories");
        $this->noResult($post);
        $session = Session::getInstance();
        $comments = $this->comments($post, $slugCategory, $slug, $id);
        $nbrComments = count($comments);
        $form = new BootstrapForm($_POST);
        $this->render('posts.show', compact('post', 'comments', 'nbrComments', 'session', 'form', 'categories', 'slugCategory', 'slug', 'id', 'pagination'));
    }

    public function comments($post,$slugCategory, $slug, $id){
        $comments = $this->Comment->lastComments($post->id);
        $session = Session::getInstance();
        if(!empty($_POST)){
            $result = $this->Comment->create([
                'content' => strip_tags($_POST['content']),
                'post_id' => strip_tags($post->id),
                'date' => strip_tags($this->date),
                'username' => strip_tags(Session::getInstance()->read('auth')->username),
                'approved' => $session->read("auth")->role == "admin" ? 1 : null
            ]);
            if($result){
                Session::getInstance()->setFlash('success', 'Votre commentaire à bien été posté !');
                Url::redirect("$slugCategory/$slug/$id#list_comments");
            }
        }
        return $comments;
    }
}