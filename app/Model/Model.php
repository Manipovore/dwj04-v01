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

