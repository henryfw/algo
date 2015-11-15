<?php


function mergeIntervals($listOfArrays) {

    // sort this list by first value
    usort($listOfArrays, function($a, $b) {
        return $a[0] - $b[0];
    });

    $intervals = array();


    $lastOpen = $listOfArrays[0][0];
    $lastClose = $listOfArrays[0][1];
    foreach ($listOfArrays AS $item) {
        if ($item[0] > $lastClose + 1) {
            // new interval
            $intervals[] = [$lastOpen, $lastClose];
            $lastOpen = $item[0];
            $lastClose = $item[1];
        }
        else {
            // extend interval
            if ($item[1] > $lastClose ) {
                $lastClose = $item[1];
            }
        }
    }

    if (!in_array([$lastOpen, $lastClose], $intervals)) {
        $intervals[] = [$lastOpen, $lastClose];
    }
    return $intervals;

}


print_r(mergeIntervals([[1,3],[2,6],[8,10],[15,18],[16,17],[1,5]]));