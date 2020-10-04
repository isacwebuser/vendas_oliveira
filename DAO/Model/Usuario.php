<?php

class Usuario{

    private $idUsuario;
    private $desLogin;
    private $desNome;
    private $desPass;
    private $desEmail;
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
    public function getDesEmail(){
        return $this->desEmail;
    }
    public function setDesEmail($value){
        $this->desEmail = $value;
    }
    public function setDatCadastro($value){
        $this->datCadastro = $value;
    }
    public function getDatCadastro(){
        return $this->datCadastro;
    }

    public function __construct($desLogin="", $desNome="", $desPass="", $desEmail=""){
        $this->setDesLogin($desLogin);
        $this->setDesNome($desNome);
        $this->setDesPass($desPass);
        $this->setDesEmail($desEmail);
    }

    public function setData($data){
        $this->setIdUsuario($data['idUsuario']);
        $this->setDesLogin($data['desLogin']);
        $this->setDesNome($data['desNome']);
        $this->setDesPass($data['desPass']);
        $this->setDesEmail($data['desEmail']);
        $this->setDatCadastro(new DateTime($data['datCadastro']));


    }
    public function __toString(){

        return json_encode([
            "idUsuario" => $this->getIdUsuario(),
            "desLogin" => $this->getDesLogin(),
            "desNome" => $this->getDesNome(),
            "desPass" => $this->getDesPass(),
            "desEmail" => $this->getDesEmail(),
            "datCadastro" => $this->getDatCadastro()->format("d/m/Y H:i:s")
        ]);
    }

    public function login($desLogin, $desPass){
        $sql = new Model();

        $result = $sql->select("SELECT * FROM portal_consultas.tab_usuario WHERE desLogin = :DESLOGIN AND desPass = :DESPASS", array(
            ":DESLOGIN"=>$desLogin,
            ":DESPASS"=>md5($desPass)
        ));

        if (count($result) > 0){
            $this->setData($result[0]);
        }
        return $result;
    }

    public function loadById($id){
        $sql = new Model();
        $result = $sql->select("SELECT * FROM tab_usuario WHERE idUsuario = :ID", array(":ID"=>$id));

        if (count($result) > 0){
            $this->setData($result[0]);

        } else{
            var_dump("Nenhum resultado encontrado para a consulta.");

        }
        return $result;
    }

    static function getList(){
        $sql = new Model();

        return $sql->select("SELECT * FROM tab_usuario ORDER BY desLogin;");
    }

    static function geSearch($desLogin){
        $sql = new Model();

        return $sql->select("SELECT * FROM tab_usuario WHERE desLogin LIKE :SEARCH ORDER BY desLogin", array(
            ":SEARCH"=>"%". $desLogin . "%"
        ));
    }

    public function insertUser(){
        $sql = new Model();
        $result = $sql->select("CALL vendas_oliveira.sp_add_usuario(:desLogin, :desNome, :desPass, :desEmail)", array(
           ":desLogin"=>$this->getDesLogin(),
           ":desNome"=>$this->getDesNome(),
           ":desPass"=>$this->getDesPass(),
           ":desEmail"=>$this->getDesEmail()
        ));
        if (count($result) > 0){
            $this->setData($result[0]);
        }
    }

    public function updateUser($desLogin, $desNome, $desPass,$desEmail){
        $this->setDesLogin($desLogin);
        $this->setDesNome($desNome);
        $this->setDesPass($desPass);
        $this->setDesEmail($desEmail);

        $sql = new Model();
        $sql->query("UPDATE tab_usuario SET desLogin = :desLogin, desNome = :desNome, desPass = :desPass, desEmail = :desEmail WHERE idUsuario = :idUsuario", array(
            ':desLogin'=>$this->getDesLogin(),
            ':desNome'=>$this->getDesNome(),
            ':desPass'=>$this->getDesPass(),
            ':desEmail'=>$this->getDesEmail(),
            ':idUsuario'=>$this->getIdUsuario()
        ));
    }

    public function deletUser(){
        $sql = new Model();
        $sql->query("DELETE FROM tab_usuario WHERE idUsuario = :idUsuario", array(
            ':idUsuario'=>$this->getIdUsuario()
        ));

        $this->setIdUsuario(0);
        $this->setDesLogin("");
        $this->setDesNome("");
        $this->setDesPass("");
        $this->setDesEmail("");
        $this->setDatCadastro(new DateTime());
    }
}