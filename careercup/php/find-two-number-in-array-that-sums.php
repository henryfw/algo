<?php


// http://www.careercup.com/question?id=4447673

function findElementsForSum($inputs, $sum) {
    $map = [];
    foreach($inputs AS $i) {
        if (!isset($map[$i])) $map[$i] = 0;
        $map[$i] = $map[$i] ++;
    }

    foreach($map AS $i => $count) {
        $opposite = $sum - $i;
        if ($opposite == $i) {
            if ($count >= 2) return [$i, $i];
            else continue;
        }
        if (isset($map[$opposite])) {
            return [$i, $opposite];
        }

    }
    return null;
}


print_r(findElementsForSum([1,2,3,4,5,6,7], 5));