<?php
session_start();
$height = 500;
$width = 1000;
$image = imagecreate($width, $height);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);


$numpoints = 5;
$dotsize=7;
//random x and y and draw dots
for ($i = 0; $i < $numpoints; $i++) {
    $x = rand(0, $width);
    $y = rand(0, $height);
    $vector["x"][$i] = $x;
    $vector["y"][$i] = $y;
    imagefilledellipse($image,$x,$y,$dotsize,$dotsize,$white);
}

for ($i = 0; $i < sizeof($vector["x"])-1; $i++) {
    imageline($image,  $vector["x"][$i], $vector["y"][$i], $vector["x"][$i+1], $vector["y"][$i+1], $white);

}



// header('Content-type: image/png');

imagepng($image);
// imagepng($image,"images/captcha.png");
imagedestroy($image);
