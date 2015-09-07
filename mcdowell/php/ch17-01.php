<?php

function swapNumbersInPlace(&$a, &$b) {
    $a = $a - $b; // a is now the diff
    $b = $a + $b; // b is now the original a
    $a = $b - $a; // a is now orignal a - diff
}


$a = 5;
$b = 2;
swapNumbersInPlace($a, $b);
echo "a: $a, b: $b \n";


$a = 5;
$b = 20;
swapNumbersInPlace($a, $b);
echo "a: $a, b: $b \n";




function swapInPlaceBitwise(&$a, &$b){
    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;
}

$a = 5;
$b = 2;
swapInPlaceBitwise($a, $b);
echo "a: $a, b: $b \n";


$a = 5;
$b = 20;
swapInPlaceBitwise($a, $b);
echo "a: $a, b: $b \n";

