<?php

echo <<<_html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>filehandling</title>
</head>
<body>
    <h1>
        Please upload a txt format file with 1000 integers
    </h1>
    <form action='filehandling.php' method='post' enctype = 'multipart/form-data' />
        Select file to upload:
        Select File: <input type='file' name='in' />
        <br>
        <br>
        <input type='submit' value='Upload'/>
        </form>
_html;

if (isset($_FILES)) {
    htmlentities($_FILES);
    $name = $_FILES['in']['tmp_name'];
    $type = $_FILES['in']['type'];
    if($type == "text/plain")
    {
	define("restric_input_size", 1000);
        $content = file_get_contents($name);
	$array = str_split($content);
	if(sizeof($array) != restric_input_size)
		die ("the file does not contain 1000 integer");
	//if(!isInputValid($array))
		//die("the file should only contain integers");
	$res = product($array);
	$fac = sum($res);	
	echo "the max product is: $res<br>";
	echo "the sum of factorial of each digit is: $fac<br>";
    }
    else
    {
        echo "<br>file format not support<br>";
    }
}
else
    echo "<br>no files selected<br>";
echo "</body></html>";

function test()
{
    $factorialCase1 = factorial(7);
    $factorialCase2 = factorial(0);

    $sumCase1 = sum(720);
    $sumCase2 = sum(10);
    $sumCase3 = sum(0);

    if($factorialCase1 == 5040)
        echo "fCase1 pass<br>";
    else
        echo "fCase1 fail<br>";
    if($factorialCase2 == 0)
        echo "fCase2 pass<br>";
    else
        echo "fCase2 fail<br>";
    
    if($sumCase1 == 5042)
        echo "sCase1 pass<br>";
    else
        echo "sCase1 fail<br>";
    if($sumCase2 == 1)
        echo "sCase2 pass<br>";
    else
        echo "sCase2 fail<br>";
    if($sumCase3 == 0)
        echo "sCase3 pass<br>";
    else   
        echo "sCase3 fail<br>";
}

function product($arr)
{
    $result = $arr[0] * $arr[1] * $arr[2] * $arr[3] * $arr[4];
    for ($i = 5; $i < sizeof($arr)-1; $i++) {
        $j = $i - 5;
        $temp = $result * $arr[$i] / $arr[$j];
        if ($result < $temp) {
            $result = $temp;
        }

    }
    return $result;
}

function isNum($input)
{
	define("checker", 0);
	$check = checker + $input;
	if($input != 0 && $check == 0)
		return false;
	else
		return true;
}

function isInputValid($arr)
{
	for($i = 0; $i < sizeof($arr-1); $i++)
	{
		if(!isNum($arr[$i]))
			return false;
	}
	return true;
}

function factorial($integer)
{
	if($integer == 0)
		return 0;
    $result = 1;
    for ($i = 1; $i <= $integer; $i++) {
        $result *= $i;
    }
    return $result;
}

function sum($in)
{
    define("mod", 10);
    define("tenThousand", 10000);
    define("thousand", 1000);
    define("hundred", 100);
    define("ten", 10);
    $n1 = factorial($in / tenThousand % mod);
    $n2 = factorial($in / thousand % mod);
    $n3 = factorial($in / hundred % mod);
    $n4 = factorial($in / ten % mod);
    $n5 = factorial($in % mod);
    $result = $n1 + $n2 + $n3 + $n4 + $n5;
    return $result;
}


