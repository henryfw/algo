<?php

// http://www.careercup.com/question?id=4892713614835712


function addBinaryNumbers($a, $b) {

    $lengthA = strlen($a);
    $lengthB = strlen($b);

    if ($lengthA > $lengthB) {
        $b = str_pad($b, $lengthA, '0', STR_PAD_LEFT);
        $maxLength = $lengthA;
    }
    else {
        $a = str_pad($a, $lengthB, '0', STR_PAD_LEFT);
        $maxLength = $lengthB;
    }

    $ans = "";
    $i = $maxLength - 1;
    $carry = 0;

    while ($i >= 0) {
        $sum = ((int) $a{$i}) + ((int) $b{$i}) + $carry;
        if ($sum > 1) {
            $carry = 1;
            $sum = $sum % 2;
        }
        else {
            $carry = 0;
        }
        $ans = $sum . $ans;
        $i --;

    }

    if ($carry) {
        $ans = "1$ans";
    }

    return $ans;
}


echo addBinaryNumbers('100011', '100100');

