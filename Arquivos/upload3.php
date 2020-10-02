<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileUpload">
    <button type="submit"> Send</button>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $file = $_FILES["fileUpload"];

    if($file["error"]){
        throw new Exception("Error: " .  $file["error"]);
    }
    $dirTmp = "tmp";

    if(!is_dir($dirTmp)){
        mkdir($dirTmp);
        echo "Foi necessário criar o diretório";
    }

    if(move_uploaded_file($file["tmp_name"], $dirTmp . DIRECTORY_SEPARATOR . $file["name"])){
        echo "Upload realizado com sucesso";

    }else {
        throw new Exception("Não foi possível realizar upload");
    }
}

?>
