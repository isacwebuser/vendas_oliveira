<?php

class Banco extends PDO{

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=vendas_oliveira", "webuser", "password");
        echo "aqui";
    }


}

