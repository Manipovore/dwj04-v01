<?php

namespace App\Controller\Admin;
use Core\Session\Session;
use Core\HTTP\Url;

class CommentsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Comment');
    }

    public function index(){
        $comments = $this->Comment->allComments();
        $nbrCommentsReport = 0;
        $nbrCommentsNew = 0;
        foreach($comments as $comment){
            if ($comment->report == 1){
                $nbrCommentsReport += 1;
            }
            if($comment->approved == null){
                $nbrCommentsNew += 1;
            }
        }
        $this->render('admin.comments.index', compact('comments', 'nbrCommentsReport', 'nbrCommentsNew'));
    }

    public function show($id, $post_id){
        $post = $this->Post->find($post_id);
        $comment = $this->Comment->find($id);
        $this->render('admin.comments.show', compact('post', 'comment'));
    }

    public function approved($id){
        $comment = $this->Comment->find($id);
        if($comment){
            $this->Comment->update($id, [
                'approved' => 1,
                'report' => null,
            ]);
            Session::getInstance()->setFlash('success', 'Le commentaire a bien été approuvé !');
            Url::redirect('admin/comments');
        }
    }

    public function delete($id){
        if(!empty($_POST)){
            $this->Comment->delete(intval($id));
            Session::getInstance()->setFlash('success', 'Le commentaire a bien été supprimé !');
            Url::redirect('admin/comments');
        }
    }

}