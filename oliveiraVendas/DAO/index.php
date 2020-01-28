<?php

require_once ("config.php");

$consulta = new Usuario();

$consulta->loadById(5);

echo $consulta;