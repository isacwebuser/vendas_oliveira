<?php

$filename = "estrutura_ti.jpeg";

$base64 = base64_encode(file_get_contents($filename));

$fileinfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $fileinfo->file($filename);


$base64Encode =  "data:" . $mimeType . ";base64," . $base64;
?>
<a href="<?=$base64Encode?>" target="_blank">Imagem TI</a>
<img src="<?=$base64Encode?>">
