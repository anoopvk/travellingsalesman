<?php
$a = [0, 1, 2, 3, 4];



for ($i = 0; $i < 5; $i++) {
    echo $a[$i] . " ";
}
echo "<br>";
while ($a) {

    $a = nextorder($a);
}

// $a = nextorder($a);
// $a = nextorder($a);
// $a = nextorder($a);
// $a = nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);

// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);
// $a=nextorder($a);


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
    // echo $size;
    // echo "<br>";

    // echo $x;
    // echo " ";

    //finding y
    $y = -1;
    for ($i = 0; $i < $size; $i++) {
        if ($p[$x] < $p[$i]) {
            $y = $i;
        }
    }
    // echo $y;

    //swap values at x and y
    $temp = $p[$x];
    $p[$x] = $p[$y];
    $p[$y] = $temp;


    //reverse everything after x
    $p = reverse($p, $x + 1, $size);
    echo "<br>";

    // print_r($p);
    // echo '<pre>'; print_r($p); echo '</pre>';
    // echo ".....<br>";
    for ($i = 0; $i < $size; $i++) {
        echo $p[$i] . " ";
    }
    echo "<br>";

    // echo "<br>.....<br>";

    return $p;
}

function reverse($array, $start, $end)
{
    $len = $end - $start;
    // echo "<br> before<br>";
    // for ($i = 0; $i < sizeof($array); $i++) {
    //     echo $array[$i] . " ";
    // }
    for ($i = 0; $i < $len / 2; $i++) {
        $temp = $array[$end - 1];
        $array[$end - 1] = $array[$start];
        $array[$start] = $temp;
        $end--;
        $start++;
    }
    return $array;
    // echo "<br> after <br>";
    // for ($i = 0; $i < sizeof($array); $i++) {
    //     echo $array[$i] . " ";
    // }
}


?>
