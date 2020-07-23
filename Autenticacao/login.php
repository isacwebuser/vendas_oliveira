<?php
session_start();

define("URL", "/var/www/html");
include (URL . DIRECTORY_SEPARATOR . "DAO/config.php");

if(empty($_POST['desLogin']) || empty($_POST['desPass'])){
    header('Location: ../index.php');
    exit;
}

$request = $_POST;
$consultaLogin = new Usuario();

$consultaSaida = $consultaLogin->login($request['desLogin'], $request["desPass"]);

if(count($consultaSaida) == 1){
    $_SESSION['desLogin'] = $request['desLogin'];
    header('Location: ../painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header("Location: ../index.php");
    exit();
}

