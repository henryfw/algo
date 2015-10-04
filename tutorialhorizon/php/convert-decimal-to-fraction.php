<?php

// http://algorithms.tutorialhorizon.com/convert-decimal-into-irreducible-fraction/

function convertFromDecimalToFraction($n) {
    $n = (string) $n;
    $strN = explode(".", $n);
    $strN = $strN[count($strN) - 1];
    $strN = rtrim($strN, '0');

    $length = strlen($strN);

    $den = pow(10, $length);
    $num = $strN;


    $gcd = getGcd($num, $den);

    $den /= $gcd;
    $num /= $gcd;

    return "$num/$den";

}


function getGcd($a, $b) {
    if ($b == 0) return $a;
    return getGcd($b, $a % $b);
}


echo getGcd(100,20) . "\n";
echo getGcd(100,40) . "\n";
echo getGcd(100,41) . "\n";
echo getGcd(20,100) . "\n";


echo convertFromDecimalToFraction(.35) ."\n";