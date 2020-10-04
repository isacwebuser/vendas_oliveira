<?php

$data = [
    "nome" => "teste_senha"
];

define("SECRET", pack("a16", "i1s9a9c1"));
define("SECRET_IV", pack("a16", "i1s9a9c1"));

$encrypt = openssl_encrypt(
    json_encode($data),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV
);

$final = (base64_encode($encrypt));
var_dump($final);


$string = openssl_decrypt(base64_decode($final),
    'AES-128-CBC',
    SECRET,
    0,
    SECRET_IV);

var_dump(json_decode($string, true));