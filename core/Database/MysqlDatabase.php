<?php

namespace Core\Database;

use \PDO;

class MysqlDatabase extends Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct( $db_name = "blog", $db_user = "root", $db_pass = "", $db_host = "localhost"){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        if($this->pdo === null){
            $dsn = "mysql:dbname=$this->db_name;host=$this->db_host";
            $user = $this->db_user;
            $password = $this->db_pass;
            $pdo = new PDO($dsn , $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->query("SET NAMES UTF8");//Solution encodage UTF8
            $this->pdo = $pdo;

        }
        return $this->pdo;
    }

    public function query($statement, $one = null){
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_OBJ);
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    // injection SQL
    public function prepare($statement, $attributes, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        //on recherche pas des résultats on exécute
        if(strpos($statement, 'UPDATE') === 0 || strpos($statement, 'INSERT') === 0 || strpos($statement, 'DELETE') === 0){
            return $res;
        }
        $req->setFetchMode(PDO::FETCH_OBJ);
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}