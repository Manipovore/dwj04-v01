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

    public function all($table)
    {
        return $this->query('SELECT * FROM ' . $table);
    }

    public function find($id, $table)
    {
        return $this->query("SELECT * FROM {$table} WHERE id = ?", [$id], true);
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

