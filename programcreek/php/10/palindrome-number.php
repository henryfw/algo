<?php


function isPalindromeNumber($n) {
    if ($n < 0) return false;


    $div = 1;
    while ($n / $div >= 10) $div *= 10;

    while ($n) {
        $left = floor($n/$div);
        $right = $n % 10;

        if ($left != $right) return false;

        $n = floor( ($n % $div ) / 10 );

        $div /= 100; // 2 digits at a time
    }

    return true;
}