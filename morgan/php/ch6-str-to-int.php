<?php


function strToInt($str) {
    $negative = 0;
    if ($str{0} == '-') $negative = 1;

    $num = 0;
    $base = 1;
    for ($i = strlen($str) - 1; $i >= $negative; $i -- ) {
        $num += $str{$i} * $base;
        $base *= 10;
    }

    return $negative ? -1 * $num : $num;
}

echo strToInt("1203");
echo "\n";
echo strToInt("-1203");