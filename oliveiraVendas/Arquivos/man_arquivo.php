<?php

class Arquivos{

    private $dirName = "Teste";
    private $file;

    public function getDirName(){
        return $this->dirName;
    }
    public function setDirName($dirName){
        $this->dirName = $dirName;
    }
    public function getFile(){
        return $this->file;
    }
    public function setFile($file){
        $this->file = $file;
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

    public function gerarLog(){

        var_dump(file_exists($this->file));

        if (!file_exists($this->file)){

            $this->file = fopen("/tmp/log_".date("YmdH").".txt", "w+");
            fwrite($this->file, date("d/m/Y H:i:s") . "\r\n");
            fclose($this->file);
                echo "Arquivo de Log criado com sucesso.";
            }

        else {

            $this->file = fopen("/tmp/log_".date("YmdH").".txt", "a+");
            fwrite($this->file, date("d/m/Y H:i:s"));
            fclose($this->file);

            echo "Adicionada linha.";
        }

    }
}

$saida = new Arquivos();
echo $saida->gerarLog();