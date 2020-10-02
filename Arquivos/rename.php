<?php

$dir1 = "Teste";
$dir2 = "tmp";

if (is_dir($dir1)){
    mkdir($dir1);
}else{
    echo "$dir1 já existe";
}
if (is_dir($dir2)){
    mkdir($dir2);
} else{
    echo "$dir2 já existe";
}
$filename = "README.txt";

if (!file_exists($dir1 . DIRECTORY_SEPARATOR . $filename)){
    $file = fopen($dir1 . DIRECTORY_SEPARATOR . $filename, "w+");
    fwrite($file, date("Y-m-d H:i:s"));
    fclose($file);
}
rename($dir1 . DIRECTORY_SEPARATOR . $file, $dir2 . DIRECTORY_SEPARATOR . $file);


