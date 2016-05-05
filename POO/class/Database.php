<?php

class Database{

    private $pdo;

    public function __construct($login,$password, $dbname, $host = 'localhost',$port=3306, $charset='utf8'){

        $this->pdo = new PDO("mysql:host=$host;$port;$dbname;$charset", $login, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    }

    public function query($query, $params){

        $req = $this->pdo->prepare($query);
        $req->execute($params);
        return $req;

    }

}