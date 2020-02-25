<?php

function product($arr)
{   
    $result = $arr[0] * $arr[1] * $arr[2] * $arr[3] * $arr[4];
    for($i = 5; $i < sizeof($arr); $i++)
    {
        $j = $i - 5;
        $temp = $result * $arr[$i] / $arr[$j];
        if($result < $temp)
            $result = $temp;
    }
    return $result;
}

function factorial($integer)
{
    $result = 1;
    for($i = 1; $i <= $integer; $i++)
        $result *= $i;
    return $result;
}

function sum($in)
{
    $n1 = factorial($in/10000%10);
    $n2 = factorial($in/1000%10);
    $n3 = factorial($in/100%10);
    $n4 = factorial($in/10%10);
    $n5 = factorial($in%10);
    $result = $n1 + $n2 + $n3 + $n4 + $n5;
    return $result;
}

<<<_html

_html
?>