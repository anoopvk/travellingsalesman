<?php

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


$dist=[];
//draw line between points 
for ($i = 0; $i < sizeof($vector["x"])-1; $i++) {
    imageline($image,  $vector["x"][$i], $vector["y"][$i], $vector["x"][$i+1], $vector["y"][$i+1], $white);
    $dist[$i] = distcalc($vector["x"][$i], $vector["y"][$i], $vector["x"][$i+1], $vector["y"][$i+1]);

}




header('Content-type: image/png');
imagepng($image);
// imagepng($image,"images/captcha.png");
imagedestroy($image);



function distcalc($x1,$y1,$x2,$y2){
   return sqrt(pow(($x1-$x2),2)+pow(($y1-$y2),2));
}