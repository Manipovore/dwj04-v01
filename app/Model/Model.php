<?php

namespace App\Model;
use Core\Database\MysqlDatabase;

class Model
{

    protected $modelName;
    protected $db; //injection de dépendance

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
        // si le nom de la table n'est pas définie
        if(is_null($this->modelName)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->modelName = strtolower(str_replace('Model', '', $class_name)) . 's';
        }
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->modelName);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->modelName} WHERE id = ?", [$id], true);
    }

    public function lastInsert(){
        return $this->query("SELECT * FROM {$this->modelName} ORDER BY id DESC LIMIT 0,1 " );
    }

     /**
     * @param $id id de l'article
     * @param $fields Array : Table.php -> champs de l'article (title, content ...)
     * @return array|bool|mixed|\PDOStatement
     */
    public function update($id, $fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id; // Les valeurs des champs et rajout de l'id pour le WHERE
        $sql_part = implode(', ', $sql_parts); // (champs1 = ?, champs2 = ?) sert pour la requete SET
        return $this->query("UPDATE {$this->modelName} SET $sql_part WHERE id = ?", $attributes, true);
    }

    public function delete($id){
        return $this->query("DELETE FROM {$this->modelName} WHERE id = ?", [$id], true);
    }

    public function create($fields){
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts); // (champs1 = ?, champs2 = ?) sert pour la requete SET
        return $this->query("INSERT INTO {$this->modelName} SET $sql_part", $attributes, true);
    }

    public function extract_list($key, $value){
        $records = $this->all();
        $result = [];
        foreach($records as $v){
            $result[$v->$key] = $v->$value;
        }
        return $result;
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                $one
            );
        }
    }

}

