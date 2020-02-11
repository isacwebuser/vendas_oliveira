<?php

require_once("config.php");

$sql = new Banco();
$users = $sql->select("SELECT * FROM tab_usuario ORDER BY desLogin");

$headers = array();

//Foreach de cabeçalho
foreach ($users[0] as $key => $value) {
    array_push($headers, ucfirst($key));
}
$file = fopen("usuarios.csv", "w+");
fwrite($file, implode(",", $headers) . "\r\n");
//Foreach de linha
foreach ($users as $rows) {
    $data = array();
    //Foreach de coluna
    foreach ($rows as $columns => $value) {
        array_push($data, $value);
    }
    fwrite($file, implode(",", $data) . "\r\n");
}

fclose($file);