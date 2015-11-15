<?php

function addBinary($a, $b) {

    $aVal = getValue($a);
    $bVal = getValue($b);

    $total = $aVal + $bVal;

    $ans = "";
    $power = floor ( log($total, 2) );

    while ($power >= 0) {
        if ($total / pow(2, $power) >= 1) {
            $total -= pow(2, $power);
            $ans = "$ans" . 1;
        }
        else {
            $ans = "$ans" . 0;
        }

        $power --;
    }

    return $ans;

}


function getValue($a) {

    $aVal = 0;

    $power = 0; // 2^power
    for ($i = strlen($a) - 1; $i >=0; $i --) {
        $aVal += pow(2, $power) * $a{$i} ;
        $power ++;
    }

    return $aVal;
}


function addBinaryBetter($a, $b) {

    $m = strlen($a) - 1;
    $n = strlen($b) - 1;

    $ans = '';

    $carry = 0;
    while ($m >= 0 and $n >= 0) {

        $sum = $a{$m} + $b{$n} + $carry;

        if ($sum == 1) {
            $ans = '1' . $ans;
            $carry = 0;
        }
        else if ($sum == 2) {
            $ans = '0' . $ans;
            $carry = 1;
        }
        else if ($sum == 3) {
            $ans = '1' . $ans;
            $carry = 1;
        }
        else {
            $ans = '0' . $ans;
            $carry = 0;
        }
        $m --;
        $n --;
    }


    while ($m >= 0) {
        $sum = $a{$m} + $carry;

        if ($sum == 2) {
            $carry = 1;
            $ans = '0' . $ans;
        }
        else {
            $carry = 0;
            $ans = $a{$m} . $ans;
        }
        $m --;
    }

    while ($n >= 0) {
        $sum = $b{$n} + $carry;

        if ($sum == 2) {
            $carry = 1;
            $ans = '0' . $ans;
        }
        else {
            $carry = 0;
            $ans = $b{$n} . $ans;
        }
        $n --;
    }



    if ($carry) {
        $ans = '1' . $ans;
    }

    return $ans;
}


var_dump( addBinaryBetter('11', '1')   );
var_dump( addBinaryBetter('0', '0')   );
var_dump( addBinaryBetter('111', '01')   );