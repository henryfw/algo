<?php

function searchInsertPosition($A, $target) {

    if (!count($A) || $target < $A[0]) return 0;

    $left = 0;
    $right = count($A) - 1;
    while ($left < $right) {
        $mid =  floor( ($right + $left) / 2 );

        if ($target == $A[$mid]) {
            return $mid;
        }
        else if ($target < $A[$mid]) {
            $right = $mid - 1;
        }
        else if ($target > $A[$mid]) {
            $left = $mid + 1 ;
        }
    }

    return $left + 1;

}



echo searchInsertPosition([1,3,5,6], 5) . "\n\n";
echo searchInsertPosition([1,3,5,6], 2) . "\n\n";
echo searchInsertPosition([1,3,5,6], 7) . "\n\n";
echo searchInsertPosition([1,3,5,6], 0) . "\n\n";





