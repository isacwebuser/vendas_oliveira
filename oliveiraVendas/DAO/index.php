<?php

require_once ("config.php");

$sql =new Banco();

$result = $sql->select("SELECT * FROM tab_usuario");

echo json_encode($result);