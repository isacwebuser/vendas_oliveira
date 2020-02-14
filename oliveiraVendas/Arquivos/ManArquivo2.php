<?php

require_once("DAO/config.php");

class Exportar{

    private $file;

    private $headers = array();

    public function getHeaders(){
        return $this->headers;
    }
    public function setHeaders($headers){
        $this->headers = $headers;
    }
    public function getFile(){
        return $this->file;
    }
    public function setFile($file){
        $this->file = $file;
    }
    public function montarCSV(){

        $users = new Usuario();
        $saida = $users->getList();
//Foreach de cabeçalho
        if(count($saida) > 0){

        foreach ($saida[0] as $key => $value) {
            array_push($this->headers, ucfirst($key));
        }
        $this->file = fopen("usuarios_". date("YmdHmi") . ".csv", "w+");
        fwrite($this->file, implode(",", $this->headers). "\r\n");
//Foreach de linha
        foreach ($saida as $rows) {
            $data = array();
//Foreach de coluna
            foreach ($rows as $columns => $value) {
                array_push($data, $value);
            }
            fwrite($this->file, implode(",", $data). "\r\n");
        }
        fclose($this->file);
        echo "Concluído com sucesso.";
    } else {
            echo "Nenhum registro encontrado.";
        }
    }
    public function deleteCSV(){
        $dir = "images";
        if(!is_dir($dir)){
            mkdir($dir);
        }

        foreach (scandir($dir) as $item){
            if(!in_array($item, array(".", ".."))){
                unlink($dir . DIRECTORY_SEPARATOR . $item);
            }
        }
    }
}

$end = new Exportar();
$result = $end->montarCSV();
