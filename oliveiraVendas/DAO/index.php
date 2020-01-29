<?php

require_once ("config.php");

//Consulta unitária
//$consulta = new Usuario();
//$consulta->loadById(5);
//echo $consulta;

//Consulta de lista
//$lista = Usuario::getList();
//echo json_encode($lista);

//Pesquisa de usuario
//$search = Usuario::geSearch("usuario");
//echo json_encode($search);

//Simulando autenticação
$autenticacao = new Usuario();
$autenticacao->login("adm", "teste123");

echo $autenticacao;