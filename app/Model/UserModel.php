<?php

namespace App\Model;

class UserModel extends Model{

    /**
     * Recupere les infos de l'user
     * @param $id int
     * @return Object
     */
    public function findUser($id){
        return $this->query("
        SELECT users.*
        FROM users
        WHERE users.id = ?
        ", [$id], true);
    }
}