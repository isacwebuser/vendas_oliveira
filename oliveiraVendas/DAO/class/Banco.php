<?php

class Banco extends PDO{

    private $conn;

    public function __construct(){

        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=vendas_oliveira", "root", "i1s9a9c1");
        } catch (PDOException $e){
            die("Error: " . $e->getMessage());
        }

    }

    private function setParams($statment, $parameters = array()){

        foreach ($parameters as $key => $value){
            $statment->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

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

