<?php

function reverseNumber($n) {
    $isNegative = $n < 0;

    $result = 0;
    $remaining = abs($n);

    while($remaining) {
        $result = $result * 10 + $remaining % 10;
        $remaining = floor($remaining/ 10);
    }

    return $isNegative ? - $result : $result;
}


echo reverseNumber(1234);