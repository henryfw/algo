<?php

function kthClosestStar($inputs, $k) {

    $maxHeap = new SplMaxHeap();


    for ($i = 0; $i < $k && $i < count($inputs); $i ++ ) {
        $maxHeap->insert($inputs[$i]);
    }

    for ($i = $k; $i < count($inputs); $i ++ ) {
        $top = $maxHeap->top();

        if ($inputs[$i] < $top) {
            $maxHeap->extract();
            $maxHeap->insert($inputs[$i]);
        }
    }

    $ans = [];
    while (!$maxHeap->isEmpty()) {
        array_unshift($ans, $maxHeap->extract());
    }

    return $ans;
}


print_r(kthClosestStar([1,2,55,6,77,88,99,100,3], 3));