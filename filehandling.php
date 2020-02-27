<?php

function product($arr)
{
    $result = $arr[0] * $arr[1] * $arr[2] * $arr[3] * $arr[4];
    for ($i = 5; $i < sizeof($arr); $i++) {
        $j = $i - 5;
        $temp = $result * $arr[$i] / $arr[$j];
        if ($result < $temp) {
            $result = $temp;
        }

    }
    return $result;
}

function factorial($integer)
{
    $result = 1;
    for ($i = 1; $i <= $integer; $i++) {
        $result *= $i;
    }

    return $result;
}

function sum($in)
{
    $n1 = factorial($in / 10000 % 10);
    $n2 = factorial($in / 1000 % 10);
    $n3 = factorial($in / 100 % 10);
    $n4 = factorial($in / 10 % 10);
    $n5 = factorial($in % 10);
    $result = $n1 + $n2 + $n3 + $n4 + $n5;
    return $result;
}

echo <<<_html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filehandling</title>
</head>
<body>
    <h1>
        Please submit a txt format file with 1000 integers
    </h1>
    <button>upload</button>
    <form action="filehandling.php" method="post" id="user">
        Select file to upload:
        <input type="file" name="in">
        <br>
        <br>
        <input type="submit" value="Upload">
        </form>

_html;

if ($_FILES) {
    htmlentities($_FILES);
    $name = $_FILES['in']['name'];
    $type = $_FILES['in']['type'];
    if($type == 'text/plane')
    {
        $content = file_get_contents($name);
    }
    else
    {
        echo "file format not support<br>";
    }
}
echo "</body></html>";
