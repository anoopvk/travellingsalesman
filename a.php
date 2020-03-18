<?php

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



?>
