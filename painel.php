<?php

session_start();
include ("Autenticacao/validaLogin.php");

?>
<h2>Olá, <?php var_dump($_SESSION);?></h2>
<h1><a href="Autenticacao/logout.php">Sair</a></h1>
