<?php

class Arquivos{

    private $dirName;
    private $file;

    public function getFile(){
        return $this->file;
    }
    public function setFile($file){
        $this->file = $file;
    }
    public function getDirName(){
        return $this->dirName;
    }
    public function setDirName($dirName){
        $this->dirName = $dirName;
    }

    public function validarDir(){
        $this->dirName = "Teste3";
        if(!file_exists($this->dirName)){
            mkdir($this->dirName);
            echo "Diretório $this->dirName criado com sucesso.";
        } else{
            echo "Já existe o diretório $this->dirName.";
        }
    }

    public function infoArquivos(){

        $this->dirName = "Teste";
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
    public function gerarArquivoLog(){

        $this->file = "log.txt";

        if(!file_exists($this->file)){

            $this->file = fopen("log.txt", "w+");
            fwrite($this->file, date("d/m/Y H:i:s"). " Inicio de Log. \r\n");
            fclose($this->file);
            echo "Arquivo de Log Criado";
        } else{
            $this->file = fopen("log.txt", "a+");
            fwrite($this->file, date("d/m/Y H:i:s") . " Adicionando...\r\n");
            fclose($this->file);
            echo "Adicionando trecho de log.";
        }
    }
}

$saida = new Arquivos();
echo $saida->infoArquivos();