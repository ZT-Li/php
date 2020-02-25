<?php
echo test();

function test()
{
    $test1 = convertRome("VI");
    $test2 = convertRome("IV");
    $test3 = convertRome("MCMXC");
	$test4 = convertRome("IX");
	$test5 = convertRome("a");
    if ($test1 == 6) {
        echo "test1 pass <br>";
    } else {
        echo "test1 fail <br>";
    }

    if ($test2 == 4) {
        echo "test2 pass <br>";
    } else {
        echo "test2 fail <br>";
    }

    if ($test3 == 1990) {
        echo "test3 pass <br>";
    } else {
        echo "test3 fail <br>";
    }

    if ($test4 == 9) {
        echo "test4 pass <br>";
    } else {
        echo "test4 fail <br>";
	}

    if ($test5 == null) {
        echo "test5 pass <br>";
    } else {
        echo "test5 fail <br>";
	}	
}

function isLegal($input)
{
    $length = strlen($input);
    for ($i = 0; $i < $length; $i++) {
        $single = substr($input, $i, 1);
        if (singleRtoA($single) == 0) {
            return false;
        }

    }
    return true;
}

function singleRtoA($rNum)
{
    if (strcmp($rNum, "I") == 0) {
        $rNum = 1;
    } else if (strcmp($rNum, "V") == 0) {
        $rNum = 5;
    } else if (strcmp($rNum, "X") == 0) {
        $rNum = 10;
    } else if (strcmp($rNum, "L") == 0) {
        $rNum = 50;
    } else if (strcmp($rNum, "C") == 0) {
        $rNum = 100;
    } else if (strcmp($rNum, "D") == 0) {
        $rNum = 500;
    } else if (strcmp($rNum, "M") == 0) {
        $rNum = 1000;
    } else {
        $rNum = 0;
    }

    return $rNum;
}

function convertRome($sRoNum)
{
    if (isLegal($sRoNum)) {
        $iLength = strlen($sRoNum);
        $iResult = 0;
        for ($i = 0; $i < $iLength; $i++) {
            $sSingleR = substr($sRoNum, $i, 1);
            $sSingleRNext = substr($sRoNum, $i + 1, 1);
            $iFirstRome = singleRtoA($sSingleR);
            $iNextRome = singleRtoA($sSingleRNext);
            if ($iFirstRome < $iNextRome && isSubtract($sSingleR)) {
                $iResult -= singleRtoA($sSingleR);
            } else {
                $iResult += singleRtoA($sSingleR);
            }

        }
        return $iResult;
    } else {
        return null;
    }

}

function isSubtract($singleR)
{
    if ((strcmp($singleR, "I") == 0) ||
        (strcmp($singleR, "X") == 0) ||
        (strcmp($singleR, "C") == 0)) {
        return true;
    } else {
        return false;
    }

}
