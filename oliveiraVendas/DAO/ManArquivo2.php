<?php

require_once("config.php");

class Exportar{


private $headers = array();

    public function getHeaders(){
        return $this->headers;
    }
    public function setHeaders($headers){
        $this->headers = $headers;
    }

    public function montarCSV(){

        $users = new Usuario();
        $saida = $users->loadById(10);
//Foreach de cabeçalho
        if(count($saida) > 0){

        foreach ($saida[0] as $key => $value) {
            array_push($headers, ucfirst($key));
        }
        $file = fopen("usuarios.csv", "w+");
        fwrite($file, implode(",", $headers) . "\r\n");
//Foreach de linha
        foreach ($saida as $rows) {
            $data = array();
            //Foreach de coluna
            foreach ($rows as $columns => $value) {
                array_push($data, $value);
            }
            fwrite($file, implode(",", $data) . "\r\n");
        }

        fclose($file);
    } else {
            echo "Nenhum registro encontrado.";
        }
    }
}