<?php

namespace App\Model;

class CommentModel extends Model {

    /**
     * recupere les derniers commentaires de l'article demandée
     * $param $post_id int
     * @return array
     */
    public function lastComments($post_id){
        return $this->query("
        SELECT comments.*
        FROM comments
        LEFT JOIN posts ON comments.post_id = posts.id
        WHERE comments.post_id = ?
        ORDER BY comments.date DESC
        ", [$post_id]);
    }

    /*
     * Récupération de tous les commentaires
     */
    public function allComments(){
        return $this->query("
        SELECT posts.*, comments.*
        FROM posts
        INNER JOIN comments ON posts.id = comments.post_id
        ORDER BY posts.id DESC
        ");
    }
}