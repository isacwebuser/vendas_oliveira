<?php

class Storage{
    private $file;

    public function getFile(){
        return $this->file;
    }
    public function setFile($file){
        $this->file = $file;
    }
    public function gerarLog(){

        $this->file = fopen("log_".date("Y-m-d H:i:s").".txt", "w+");
        fwrite($this->file, date("d/m/Y H:i:s"));
        fclose($this->file);

        if (!isset($this->file)){
            echo "Falha na criação do arquivo de log";
        }else{
            echo "Arquivo de Log criado com sucesso.";
        }
    }
}

$log = new Storage();
$log->gerarLog();