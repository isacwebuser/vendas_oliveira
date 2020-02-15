<?php
include ("Autenticacao/validaLogin.php");
session_start();
?>
<h2>Olá, <?php echo $_SESSION['desLogin']?></h2>
<h1><a href="Autenticacao/logout.php">Sair</a></h1>
