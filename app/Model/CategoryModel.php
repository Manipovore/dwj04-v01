<?php

namespace App\Model;

class CategoryModel extends Model {

    protected $modelName = "categories";

    public function findWithSlug($slug){
        return $this->query("
        SELECT categories.*
        FROM categories
        WHERE categories.category_slug = ?
        ", [$slug], true);
    }

    /*
     * $id de la category
     */
    public function deletePostsInCategory($id){
        return $this->query("DELETE FROM Posts WHERE category_id = ?", [$id]);
    }
}