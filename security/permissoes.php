<?php

$pasta = "arquivos";

if(!is_dir($pasta)) {
    mkdir($pasta, 0777);
    system("ls . $pasta",$return);
    echo "diretório criado com sucesso";
}