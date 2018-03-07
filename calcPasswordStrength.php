<?php

function calcPasswordStrength($password)
{
	$length = strlen($password);
	$calculatedLength = $length;

	if (5 < $length)
	{
		$calculatedLength = 5;
	}

	$numbers = preg_replace("/[^0-9]/", "", $password);
	$numericCount = strlen($numbers);

	if (3 < $numericCount)
	{
		$numericCount = 3;
	}

	$symbols = preg_replace("/[^A-Za-z0-9]/", "", $password);
	$symbolCount = $length - strlen($symbols);

	if ($symbolCount < 0)
	{
		$symbolCount = 0;
	}


	if (3 < $symbolCount)
	{
		$symbolCount = 3;
	}

	$uppercase = preg_replace("/[^A-Z]/", "", $password);
	$uppercaseCount = $length - strlen($uppercase);

	if ($uppercaseCount < 0)
	{
		$uppercaseCount = 0;
	}


	if (3 < $uppercaseCount)
	{
		$uppercaseCount = 3;
	}

	$strength = $calculatedLength * 10 - 20 + $numericCount * 10 + $symbolCount * 15 + $uppercaseCount * 10;
	return $strength;
}

echo calcPasswordStrength("1234567&^%VB&*%GF%@#^FGh89u7iasdf");

?>