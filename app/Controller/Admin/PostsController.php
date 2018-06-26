<?php

namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;
use Core\Session\Session;
use Core\Str\FormatStr;
use Core\HTTP\Url;

class PostsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $this->updatePage();
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('admin.posts.index', compact('posts', 'categories'));
    }

    /*
     * Methode qui permet le suivi cohérent entre les pages et supprime un interval irrationnel (1,2,3,4,5,6,7, ...)
     */
    private function updatePage(){
        $posts = $this->Post->old();
        $i = 1;
        foreach( $posts as $post ){
            if(intval($post->page) != intval($i) ){
                $this->Post->update($post->id,[
                    'page' => intval($i)
                ]);
            }
           $i++;
        }

    }

    public function add(){

        $lastId = $this->Post->lastInsert();
        $lastId = $lastId[0]->page;

        if(!empty($_POST)){
            $result = $this->Post->create([
                'title' => htmlentities($_POST['title']),
                "page" => intval($lastId + 1),
                'content' => htmlentities($_POST['content']),
                'date' => $this->date,
                'author' => Session::getInstance()->read('auth')->username,
                'category_id' => intval($_POST['category_id']),
                'slug' => FormatStr::formatSlug($_POST['title']),
            ]);

            if($result){
                Url::redirect('admin/posts');
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract_list('id', 'category_title');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.add', compact('categories', 'form'));
    }

    public function edit($id){
        if(!empty($_POST)){
            $result = $this->Post->update($id,[
                'title' => htmlentities($_POST['title']),
                'content' => htmlentities($_POST['content']),
                'date' => $this->date,
                'author' => Session::getInstance()->read('auth')->username,
                'category_id' => intval($_POST['category_id']),
                'slug' => FormatStr::formatSlug($_POST['title']),
            ]);
            if($result){
                Url::redirect('admin/posts');
            }
        }
        $post = $this->Post->find($id);
        $this->loadModel('Category');
        $categories = $this->Category->extract_list('id', 'category_title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form', 'post'));
    }

    public function delete($id){
        if(!empty($_POST)){
            $this->Post->delete(intval($id));
            Url::redirect('admin/posts');
        }
    }

}