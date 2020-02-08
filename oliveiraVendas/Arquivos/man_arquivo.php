<?php

class Arquivos{

    private $dirName = "Teste";

    public function getDirName(){
        return $this->dirName;
    }
    public function setDirName($dirName){
        $this->dirName = $dirName;
    }

    public function validarDir($dirName){
        if(!is_dir($this->dirName)){
            mkdir($this->dirName);
            echo "Diretório $this->dirName criado com sucesso.";
        } else{
            echo "Já existe o diretório $this->dirName.";
        }
    }

    public function infoArquivos(){

        $larquivos = scandir($this->dirName);
        $data = array();

        foreach ($larquivos as $key){
            if (!in_array($key, array(".", ".."))){
                $filename = $this->dirName . DIRECTORY_SEPARATOR . "$key";

                $info = pathinfo($filename);
                $info["create"] = date("d/m/Y H:i:s", filectime($filename));
                $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
                $info["size"] = filesize($filename);
                $info["url_file"] = "http://localhost/oliveiraVendas/Arquivos/" . str_replace("\\", "/") . $filename;

                array_push($data, $info);
            }
        }
        echo json_encode($data);
    }
}

$saida = new Arquivos();
echo $saida->validarDir("Teste");