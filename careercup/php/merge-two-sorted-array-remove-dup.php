<?php

function mergeSortedArraysWithoutDup($input1, $input2) {


    $right1 = count($input1) - 1;
    $right2 = count($input2) - 1;

    $ans = array_fill(0, count($input1) + count($input2), null);
    $indexToUse = count($input1) + count($input2) - 1;

    $lastValue = null;

    while($right1 >= 0 && $right2 >= 0) {
        $value1 = $input1[$right1];
        $value2 = $input2[$right2];

        if ($value1 > $value2) {
            if ($lastValue === null || $value1 != $lastValue) {
                $ans[$indexToUse] = $value1;
                $lastValue = $ans[$indexToUse];
                $indexToUse--;
            }
            $right1 --;
        }
        else if ($value1 < $value2) {
            if ($lastValue === null || $value2 != $lastValue) {
                $ans[$indexToUse] = $value2;
                $lastValue = $ans[$indexToUse];
                $indexToUse--;
            }
            $right2 --;
        }
        else {
            if ($lastValue === null || $value1 != $lastValue) {
                $ans[$indexToUse] = $value1;
                $lastValue = $ans[$indexToUse];
                $indexToUse--;
            }
            $right2 --;
            $right1 --;
        }
    }

    $dups = 0;
    for ($i = 0; $i < count($ans); $i ++) {
        if ($ans[$i] === null) $dups ++;
        else break;
    }

    if ($dups > 0) {
        for ($i = 0; $i < count($ans) - $dups; $i ++) {
            $ans[$i] = $ans[$i + $dups];
        }
    }

    $ans = array_slice($ans, 0, count($ans) - $dups);

    return $ans;
}


print_r (mergeSortedArraysWithoutDup([1,2,3,4], [1,1,2,3]));