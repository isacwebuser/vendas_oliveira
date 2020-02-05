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

    public function setData($data){
        $this->setIdUsuario($data['idUsuario']);
        $this->setDesLogin($data['desLogin']);
        $this->setDesNome($data['desNome']);
        $this->setDesPass($data['desPass']);
        $this->setDatCadastro(new DateTime($data['datCadastro']));

    }

    public function loadById($id){
        $sql = new Banco();
        $result = $sql->select("SELECT * FROM tab_usuario WHERE idUsuario = :ID", array(":ID"=>$id));

        if (count($result) > 0){
            $this->setData($result[0]);

        } else{
            echo "Nennhum resultado encontrado para a consulta.";

        }
    }

    static function getList(){
        $sql = new Banco();

        return $sql->select("SELECT * FROM tab_usuario ORDER BY desLogin;");
    }

    static function geSearch($desLogin){
        $sql = new Banco();

        return $sql->select("SELECT * FROM tab_usuario WHERE desLogin LIKE :SEARCH ORDER BY desLogin", array(
            ":SEARCH"=>"%". $desLogin . "%"
        ));
    }

    public function login($desLogin, $desPass){
        $sql = new Banco();
        $result = $sql->select("SELECT * FROM tab_usuario WHERE desLogin = :DESLOGIN AND desPass = :DESPASS", array(
            ":DESLOGIN"=>$desLogin,
            ":DESPASS"=>$desPass
        ));

        if (count($result) > 0){
            $this->setData($result[0]);

        } else{
            throw new Exception("Login e/ou senha inválidos");

        }
    }
    public function insertUser(){
        $sql = new Banco();
        $result = $sql->select("CALL sp_add_usuario(:desLogin, :desNome, :desPass)", array(
           ":desLogin"=>$this->getDesLogin(),
           ":desNome"=>$this->getDesNome(),
           ":desPass"=>$this->getDesPass()
        ));

        if (count($result) > 0){
            $this->setData($result[0]);
        }

    }
    public function __construct($desLogin="", $desNome="", $desPass=""){
        $this->setDesLogin($desLogin);
        $this->setDesNome($desNome);
        $this->setDesPass($desPass);

    }

    public function updateUser($desLogin, $desNome, $desPass){
        $this->setDesLogin($desLogin);
        $this->setDesNome($desNome);
        $this->setDesPass($desPass);

        $sql = new Banco();
        $sql->query("UPDATE tab_usuario SET desLogin = :desLogin, desNome = :desNome, desPass = :desPass WHERE idUsuario = :idUsuario", array(
            ':desLogin'=>$this->getDesLogin(),
            ':desNome'=>$this->getDesNome(),
            ':desPass'=>$this->getDesPass(),
            ':idUsuario'=>$this->getIdUsuario()
        ));

    }

    public function __toString(){
        return json_encode(array(
            "idUsuario" => $this->getIdUsuario(),
            "desLogin" => $this->getDesLogin(),
            "desNome" => $this->getDesNome(),
            "desPass" => $this->getDesPass(),
            "datCadastro" => $this->getDatCadastro()->format("d/m/Y H:i:s")
        ));
    }
}