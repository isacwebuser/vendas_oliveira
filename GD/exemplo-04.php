<?php

header("Content-Type: image/jpeg");

$file =  "wallpaper.jpg";
$new_width = 256;
$new_height = 256;

list($old_width, $old_height) = getimagesize($file);

// Criar imagens para uso no thumbnail
$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($file);

// Fazer merge das imagens
imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height,
$old_width, $old_height);

// Gerar Thumbnail
imagejpeg($new_image);

// destruir imagens da memória
imagedestroy($old_image);
imagedestroy($new_image);

