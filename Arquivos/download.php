<?php

$link ="https://image.shutterstock.com/image-vector/vector-idea-light-bulb-circle-600w-1011494203.jpg";
$content = file_get_contents($link);
$parse = parse_url($link);
$basename = basename($parse['path']);

$file = fopen($basename, "w+");
fwrite($file, $content);
fclose($file);
?>
<img src="<?=$basename?>">
