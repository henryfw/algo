<?php

function numberIsEqualFlippedAndReversed($num) {
    if ($num < 0) return false;

    $num = (string) $num;
    $left = 0;
    $right = strlen($num) - 1;

    while ($left < $right) {
        if (!equalsFlippedAndReversedDigit($num{$left}, $num{$right})) return false;
        $left ++;
        $right --;
    }
    return true;
}


function equalsFlippedAndReversedDigit($digit1, $digit2) {
    $digit1 = (int) $digit1;
    $digit2 = (int) $digit2;

    if ($digit1 == 0 && $digit2 == 0) return true;
    if ($digit1 == 1 && $digit2 == 1) return true;
    if ($digit1 == 8 && $digit2 == 8) return true;
    if ($digit1 == 5 && $digit2 == 5) return true;
    if ($digit1 == 6 && $digit2 == 9) return true;
    if ($digit1 == 9 && $digit2 == 6) return true;

    return false;
}


var_dump(numberIsEqualFlippedAndReversed(818));
var_dump(numberIsEqualFlippedAndReversed(1691));
var_dump(numberIsEqualFlippedAndReversed(212));