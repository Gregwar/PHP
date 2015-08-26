<?php

$image = imagecreatetruecolor(100, 30);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$phrase = '12345';
imagefill($image, 0, 0, $white);
imagettftext($image, 20, 0, 10, 24, $black, __DIR__.'/font.ttf', $phrase);

header('Content-type: image/png');
imagepng($image);
