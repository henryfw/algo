<?php



function merge($left, $right) {

    $rightCount = count($right);
    $leftCount = count($left) - $rightCount;

    $rightIndex = $rightCount - 1;
    $leftIndex = $leftCount - 1;

    $totalCount = $rightCount + $leftCount;

    $counter = 0;
    while ($rightIndex >= 0 && $leftIndex >= 0) {

        if ($right[$rightIndex] > $left[$leftIndex]) {
            $left[$totalCount - 1 - $counter] = $right[$rightIndex];
            $rightIndex --;

        }
        else {
            $left[$totalCount - 1 - $counter] = $left[$leftIndex];
            $leftIndex --;
        }
        $counter ++;
    }

    while ($rightIndex >= 0) {
        $left[$totalCount - 1 - $counter] = $right[$rightIndex];
        $counter ++;
        $rightIndex --;
    }


    return $left;
}



$left = [11,12,23,24,35,36,47,null,null,null];
$right = [1,24,26];

print_r(merge($left, $right));