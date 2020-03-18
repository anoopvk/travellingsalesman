<?php



$a=[1,2,3,4,5,6,7,8,9];
$a = reverse($a,4,9);
print_r($a);


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
