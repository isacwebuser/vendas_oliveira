<?php

class Usuario{

    private $idUsuario;
    private $desLogin;
    private $desNome;
    private $desPass;
    private $datCadastro;

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($value){
        $this->idUsuario = $value;
    }
    public function getDesLogin(){
        return $this->desLogin;
    }
    public function setDesLogin($value){
        $this->desLogin = $value;
    }
    public function getDesNome(){
        return $this->desNome;
    }
    public function setDesNome($value){
        $this->desNome = $value;
    }
    public function setDesPass($value){
        $this->desPass = $value;
    }
    public function getDesPass(){
        return $this->desPass;
    }
    public function setDatCadastro($value){
        $this->datCadastro = $value;
    }
    public function getDatCadastro(){
        return $this->datCadastro;
    }

    public function loadById($id){

        $sql = new Banco();
        $result = $sql->select("SELECT * FROM tab_usuario WHERE idUsuario = :ID", array(":ID"=>$id));

        if (count($result) > 0){
            $row = $result[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setDesLogin($row['desLogin']);
            $this->setDesNome($row['desNome']);
            $this->setDesPass($row['desPass']);
            $this->setDatCadastro(new DateTime($row['datCadastro']));
        } else{
            echo "Nennhum resultado encontrado para a consulta.";
        }
    }

    public function __toString(){

        return json_encode(array(
            "idUsuario"=>$this->getIdUsuario(),
            "desLogin" => $this->getDesLogin(),
            "desNome" => $this->getDesNome(),
            "desPass" => $this->getDesPass(),
            "datCadastro" => $this->getDatCadastro()->format("d/m/Y H:i:s")
        ));
    }

}