<?php

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image,0, 0, 0);
$gray = imagecolorallocate($image, 100,100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);
imagestring($image, 5, 440, 350, "Isac de Oliveira", $titleColor);
imagestring($image, 3, 440, 370, utf8_decode("Concluído em ") . date("d/m/Y"), $titleColor);
try {
    header("Content-Type: image/jpeg");

    imagejpeg($image);

    imagedestroy($image, "teste" . date("dmY") . ".jpg");

} catch (Exception $e){
    die($e->getMessage());

}