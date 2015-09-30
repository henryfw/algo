<?php

function romanToDecimal($input) {

    $chars = str_split(strtoupper($input));

    $length = count($chars);

    $cur = 0;
    $sum = 0;

    $last3 = 0;
    $last2 = 0;
    $last1 = getNumber($chars[0]);

    $hasReminderAfterLoop = false;

    for ($i = 1; $i < $length; $i ++) {
        $cur = getNumber($chars[$i]);

        $hasReminderAfterLoop = false;

        // process IIV , MIVI
        if ($cur > $last1) {
            $sum += $cur - $last1 ;

            $last3 = 0;
            $last2 = 0;
            $last1 = $cur;
        }
        // process VI or MVI
        else if ($cur < $last1) {

            if ($last1 == $last2 && $last2 == $last3) {
                $sum += 3 * $last1;
            }
            else if ($last1 == $last2) {
                $sum += 2 * $last1;
            }
            else {
                $sum += $last1;
            }

            $last3 = 0;
            $last2 = 0;
            $last1 = $cur;
            $hasReminderAfterLoop = true;
        }

        else {
            $last3 = $last2;
            $last2 = $last1;
            $last1 = $cur;

            $hasReminderAfterLoop = true;
        }

    }

    if ($hasReminderAfterLoop) {
        $sum += $last1 + $last2 + $last3;
    }

    return $sum;

}

function getNumber($a) {

    switch ($a) {
        case 'I': $cur = 1;
            break;
        case 'V': $cur = 5;
            break;
        case 'X': $cur = 10;
            break;
        case 'L': $cur = 50;
            break;
        case 'C': $cur = 100;
            break;
        case 'D': $cur = 500;
            break;
        case 'M': $cur = 1000;
            break;
    }

    return $cur;
}

echo romanToDecimal("IV") . "\n";
echo romanToDecimal("MVI") . "\n";
echo romanToDecimal("VII") . "\n";
echo romanToDecimal("XVII") . "\n";
echo romanToDecimal("XLVIII") . "\n";