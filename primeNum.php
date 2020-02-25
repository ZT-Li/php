<?php
echo test();

function isPrime ($num)
{
	for ($i = 2; $i < $num; $i++)
	{
		if ($num % $i == 0)
			return false;
	}
	return true;
}

function printPrime ($input)
{
	if (!is_Numeric($input))
		echo "input: $input, is not a number <br>";
	else
	{
		if ($input < 2)
			echo "No prime numbers is less than $input <br>";
		else
		{
			echo "The prime numbers that less than $input is ";
			for ($i = 2; $i <= $input; $i++)
			{
				if (isPrime($i) == true)					
					echo "$i ";
			}
			echo "<br>";
		}
	}
}

function test()
{
	echo printPrime("10");
	echo "expected: The prime numbers that less than 10 is 2 3 5 7 <br><br>";
	echo printPrime("5");
	echo "expected: The prime numbers that less than 10 is 2 3 5 <br><br>";
	echo printPrime("-1");
	echo "expected: No prime numbers is less than -1 <br><br>";
	echo printPrime("a");
	echo "expected: input: a, is not a number <br><br>";
} 
?>
