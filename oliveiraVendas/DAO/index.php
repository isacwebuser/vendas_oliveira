<?php

require_once ("config.php");

//Consulta unitária
//$consulta = new Usuario();
//$consulta->loadById(5);
//echo $consulta;

//Consulta de lista
$lista = Usuario::getList();
echo json_encode($lista);

//Pesquisa de usuario
//$search = Usuario::geSearch("usuario");
//echo json_encode($search);

//Simulando autenticação
//$autenticacao = new Usuario();
//$autenticacao->login("adm", "teste123");
//echo $autenticacao;

//Insert de novos usuarios
//$cliente = new Usuario("convidado2", "CONVIDADO DE HONRA2", "convite");
//$cliente->insertUser();
//echo $cliente;

//$usurio = new Usuario();
//$usurio->loadById(1);
//$usurio->updateUser("adm_master", "adm_master555",  "21321321");
//echo $usurio;