<?php

$ip_user = $_SERVER["SERVER_ADDR"];
$data = array(
    "id_user" => "adm",
    "ip_user" => $ip_user,
    "localidade" => "Brasília"
);
setcookie("NOME_COOKIE", json_encode($data), time()+360);

echo json_encode($ip_user);