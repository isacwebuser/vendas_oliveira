<?php

define('HOST', 'mysql:localhost;');
define('DBNAME', 'portal_consultas');
define('USER', 'root');
define('PASSWORD', 'i1s9a9c1');

class Banco extends PDO{

    private $conn;


    public function __construct(){

        try {
            $this->conn = new PDO(HOST.DBNAME, USER, PASSWORD);
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }

    }

    private function setParams($statement, $parameters = array()){

        foreach ($parameters as $key => $value){

            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);

    }

    public function query($rawQuery, $params = array()){

        $stm = $this->conn->prepare($rawQuery);

        $this->setParams($stm, $params);

        $stm->execute();

        return $stm;
    }

    public function select($rawQuery, $params = array()) {

        $stm = $this->query($rawQuery, $params);

        return $stm->fetchAll(self::FETCH_ASSOC);
    }
}

