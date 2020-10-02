<?php

if (isset($_COOKIE["NOME_COOKIE"])){
    $saida = json_decode($_COOKIE["NOME_COOKIE"], true);

    var_dump($saida);
}