<?php

function atoi($input) {

    $input = trim($input);

    $index = 0;

    $result = 0;

    $sign = '+';

    if ($input[0] == '-') {
        $sign = '-';
        $index ++;
    }
    else if ($input[0] == '+') {
        $index ++;
    }


    while ($index < strlen($input) && $input{$index} >= '0' && $input{$index} <= '9' ) {
        $result = $result * 10 + intval($input{$index}) ;
        $index ++;
    }

    if ($sign == '-') $result *= -1;

    return $result;
}



echo atoi("+100");