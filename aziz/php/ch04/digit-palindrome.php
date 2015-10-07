<?php

function isDigitPalindrome($n) {
    if ($n < 0) return false;
    if ($n == 0) return true;

    $length = floor(log10($n)) + 1;
    $mask =  pow(10, $length - 1);

    for ($i = 0; $i < floor($length / 2); $i ++ ) {
        if ( floor($n / $mask) != $n % 10) {
            return false;
        }
        $n %= $mask;
        $n /= 10;

        $mask /= 100;
    }

    return true;

}

var_dump(isDigitPalindrome(10501));
var_dump(isDigitPalindrome(1050111));

