<?php

$cep = "72320568";
$link = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init($link);
curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 2);

$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response, true);

//var_dump($data["bairro"]);
var_dump($data);