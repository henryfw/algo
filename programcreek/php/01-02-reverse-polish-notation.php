<?php

function rpn($inputs) {

    $stack = array();
    $operaters = array('+', '-', '*', '/');

    foreach($inputs AS $i) {
        if (in_array($i, $operaters) !== false) {
            $var1 = (int) array_shift($stack);
            $var2 = (int) array_shift($stack);

            if ($i == '+') $ans = $var2 + $var1;
            if ($i == '-') $ans = $var2 - $var1;
            if ($i == '*') $ans = $var2 * $var1;
            if ($i == '/') $ans = floor($var2 / $var1); // int math

            array_unshift($stack, $ans);
        }
        else {
            array_unshift($stack, $i);
        }
    }
    return $stack[0];
}

echo rpn(["2", "1", "+", "3", "*"]) . "\n\n";
echo rpn(["4", "13", "5", "/", "+"]) . "\n\n";