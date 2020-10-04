<?php

$data = [
    "nome" => "teste_senha"
];

define("SECRET", pack("a42", "i1s9a9c1"));

$encrypt = mcrypt_encrypt(
    MCRYPT_RIJNDAEL_128,
    SECRET,
    json_encode($data),
    MCRYPT_MODE_CFB
);

$final = (base64_encode($encrypt));
var_dump($final);

$string =mcrypt_decrypt(
    MCRYPT_RIJNDAEL_128,
    SECRET,
    base64_decode($final),
    MCRYPT_MODE_CFB
);

var_dump(json_decode($string, true));