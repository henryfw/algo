<?php

// can use a heap



function findKthLargest($inputs, $k) {
    shuffle($inputs);
    $l = count($inputs);

    if ($k > $l)  return null;

    $left = 0;
    $right = $l - 1;

    while ($left <= $right) {
        $pivotIndex = $right;
        $pivotValue = $inputs[$pivotIndex];

        $start = $left;
        $end = $right - 1;
        while ($start <= $end) {

            while ($inputs[$end] > $pivotValue) {
                $end --;
            }
            while($inputs[$start] < $pivotValue) {
                $start ++;
            }

            if ($start <= $end) {
                swap($inputs, $start ++, $end --);
            }
        }
        $newPivot = $end + 1;
        swap($inputs, $newPivot, $pivotIndex);

        if ($newPivot == $k - 1 ) return $pivotValue;
        else if ($newPivot > $k - 1) {
            $right = $newPivot - 1;
        }
        else {
            $left = $newPivot + 1;
        }


    }

}

function swap(&$inputs, $a, $b) {
    $tmp = $inputs[$a];
    $inputs[$a] = $inputs[$b];
    $inputs[$b] = $tmp;
}

echo findKthLargest([1,22,33,4,5,6,11,7,8],7) . "\n";