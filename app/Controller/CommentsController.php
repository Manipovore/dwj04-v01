<?php

namespace App\Controller;
use Core\Session\Session;
use Core\HTTP\Url;

class CommentsController extends AppController{

    public function __construct() {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function reporting($id, $slugCategory, $slug, $postId) {
        $comment = $this->Comment->find($id);
        if($comment){
            $result = $this->Comment->update($id, [
                'report' => intval(1),
                'approved' => 1
            ]);
            if($result){
                Session::getInstance()->setFlash('success', 'Le commentaire a bien été signalé !');
                Url::redirect("$slugCategory/$slug/$postId#list_comments");
            }
        }
    }
}