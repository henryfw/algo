<?php

function threeSumClosest($nums, $target) {

    sort($nums);
    $result = 0;
    $bestAns = PHP_INT_MAX;


    for ($i = 0; $i < count($nums); $i ++ ) {
        $j = $i + 1;
        $k = count($nums) - 1;

        while ($j < $k) {
            $total = ($nums[$i] + $nums[$j] + $nums[$k]);
            $diff = abs($target - $total);

            if ($diff == 0) {
                return $total;
            }

            if ($diff < $bestAns) {
                $bestAns = $diff;
                $result = $total;
            }

            if ($total < $target) {
                $j ++;
            }
            else {
                $k --;
            }


        }
    }

    return $result;

}



print_r(threeSumClosest([-1, 2, 1, -4], 1));