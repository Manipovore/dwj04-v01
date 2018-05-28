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
}