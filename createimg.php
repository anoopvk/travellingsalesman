<?php
set_time_limit(400);

$start_time = microtime(true);

$height = 500;
$width = 500;
$image = imagecreate($width, $height);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);


$numpoints = 10;
$dotsize = 7;
//random x and y and draw dots
for ($i = 0; $i < $numpoints; $i++) {
    $x = rand(0, $width);
    $y = rand(0, $height);
    $vector["x"][$i] = $x;
    $vector["y"][$i] = $y;
    imagefilledellipse($image, $x, $y, $dotsize, $dotsize, $white);
}
imagepng($image, "../images/dot.png");

// $vector["x"][2] = 0;
// $vector["y"][2] = 0;
// $vector["x"][1] = 3;
// $vector["y"][1] = 4;
// $vector["x"][0] = 6;
// $vector["y"][0] = 8;


//initial order
for ($i = 0; $i < $numpoints; $i++) {
    $order[$i] = $i;
}

//calculate distance
$dist = [];
$shortestdist = 2000000000;
$shortestorder = $order;
while ($order) {

    $totaldistance = 0;
    for ($i = 0; $i < sizeof($vector["x"]) - 1; $i++) {
        $dist[$i] = distcalc($vector["x"][$order[$i]], $vector["y"][$order[$i]], $vector["x"][$order[$i + 1]], $vector["y"][$order[$i + 1]]);
        $totaldistance = $totaldistance + $dist[$i];
    }
    if ($totaldistance < $shortestdist) {
        $shortestdist = $totaldistance;
        // echo "<br>";
        $shortestorder = $order;
        // print_r($shortestorder);
    }




    // print_r($order);
    // echo "<br>";
    $order = nextorder($order);
    if ($order == false) {
        // echo "<br><b>finished</b><br>";
    }
}



// draw line
for ($i = 0; $i < sizeof($vector["x"]) - 1; $i++) {
    imageline($image,  $vector["x"][$shortestorder[$i]], $vector["y"][$shortestorder[$i]], $vector["x"][$shortestorder[$i + 1]], $vector["y"][$shortestorder[$i + 1]], $white);
}
imagepng($image, "../images/shortestline.png");

//draw line between points 
// for ($i = 0; $i < sizeof($vector["x"]) - 1; $i++) {
// imageline($image,  $vector["x"][$i], $vector["y"][$i], $vector["x"][$i + 1], $vector["y"][$i + 1], $white);
// imagepng($image, "images/" . $i . "line.png");
// }




// header('Content-type: image/png');
// imagepng($image);
// imagepng($image,"images/captcha.png");
imagedestroy($image);



function distcalc($x1, $y1, $x2, $y2)
{
    return sqrt(pow(($x1 - $x2), 2) + pow(($y1 - $y2), 2));
}
function nextorder($p)
{

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
    $p = reverse($p, $x + 1, $size);
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
    return $array;

}




$end_time = microtime(true);
$execution_time = ($end_time - $start_time);

echo " Execution time = " . $execution_time . " sec";