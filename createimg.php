<?php

$height = 500;
$width = 1000;
$image = imagecreate($width, $height);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);


$numpoints = 5;
$dotsize = 7;
//random x and y and draw dots
for ($i = 0; $i < $numpoints; $i++) {
    $x = rand(0, $width);
    $y = rand(0, $height);
    $vector["x"][$i] = $x;
    $vector["y"][$i] = $y;
    imagefilledellipse($image, $x, $y, $dotsize, $dotsize, $white);
}


//initial order
for ($i = 0; $i < $numpoints; $i++) {
    $order[$i]=$i;
}

//calculate distance
$dist = [];
for ($i = 0; $i < sizeof($vector["x"]) - 1; $i++) {
    $dist[$i] = distcalc($vector["x"][$i], $vector["y"][$i], $vector["x"][$i + 1], $vector["y"][$i + 1]);
}







//draw line between points 
for ($i = 0; $i < sizeof($vector["x"]) - 1; $i++) {
    imageline($image,  $vector["x"][$i], $vector["y"][$i], $vector["x"][$i + 1], $vector["y"][$i + 1], $white);
    imagepng($image, "images/" . $i . "line.png");
}




header('Content-type: image/png');
imagepng($image);
// imagepng($image,"images/captcha.png");
imagedestroy($image);



function distcalc($x1, $y1, $x2, $y2)
{
    return sqrt(pow(($x1 - $x2), 2) + pow(($y1 - $y2), 2));
}
function nextorder($p){

    $size = sizeof($p);
    //finding x
    $x = -1;
    for ($i = 0; $i < $size - 1; $i++) {
        if ($p[$i] < $p[$i + 1]) {
            $x = $i;
        }
    }
    if ($x == -1) {
        return false;
    }
    //finding y
    $y = -1;
    for ($i = 0; $i < $size; $i++) {
        if ($p[$x] < $p[$i]) {
            $y = $i;
        }
    }
    //swap values at x and y
    $temp = $p[$x];
    $p[$x] = $p[$y];
    $p[$y] = $temp;
    //reverse everything after x
    reverse($p, $x + 1, $size);
    return $p;
}

function reverse($array, $start, $end)
{
    $len = $end - $start;
    for ($i = 0; $i < $len / 2; $i++) {
        $temp = $array[$end - 1];
        $array[$end - 1] = $array[$start];
        $array[$start] = $temp;
        $end--;
        $start++;
    }
}
