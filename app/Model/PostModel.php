<?php

namespace App\Model;

class PostModel extends Model {

    /**
     * recupere les derniers articles du plus récent au plus ancien
     * @return array
     */
    public function last(){
        return $this->query("
        SELECT posts.*, categories.category_title as category_title, categories.category_slug as category_slug
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY posts.page DESC
        ", null, null);
    }

    /**
     * recupere les derniers articles du plus récent au plus ancien
     * @return array
     */
    public function old(){
        return $this->query("
        SELECT posts.*, categories.category_title as category_title, categories.category_slug as category_slug
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY posts.page ASC
        ", null, null);
    }

    /**
     * recupere les derniers articles du plus ancien au plus récent dans un intervalle de 10
     * @return array
     */
    public function allPosts($page){
        $page = $page * 10;
        $interval = $page - 10;
        return $this->query("
        SELECT posts.*, categories.category_title as category_title, categories.category_slug as category_slug
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE page BETWEEN ? AND ?
        ORDER BY posts.page ASC
        ", [$interval, $page]);
    }

    /**
     * recupere les derniers articles de la catégorie demandée
     * $param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
        SELECT posts.*, categories.category_title as category_title, categories.category_slug as category_slug
        FROM posts
        LEFT JOIN categories ON category_id = categories.id
        WHERE posts.category_id = ?
        ORDER BY posts.date ASC
        ", [$category_id]);
    }

    /**
     * Recupere un article avec la catégorie associée
     * @param $slug String Titre du post
     * @return Object(stdClass)
     */
    public function findWithCategory($slug){
        return $this->query("
        SELECT posts.*, categories.category_title
        FROM posts
        LEFT JOIN categories ON posts.category_id = categories.id
        WHERE posts.slug = ?
        ", [$slug], true);
    }

}