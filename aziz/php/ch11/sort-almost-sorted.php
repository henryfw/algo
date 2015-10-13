<?php


function sortApproximatelySortedData(array $inputs, $k) {
    $minHeap = new SplMinHeap();
    $ans = [];

    for ($i = 0; $i < $k && $i < count($inputs); $i ++ ){
        $minHeap->insert($inputs[$i]);
    }

    for ($i = $k; $i < count($inputs); $i ++ ){
        $minHeap->insert($inputs[$i]);
        $ans[] = $minHeap->extract();
    }

    while (!$minHeap->isEmpty()) {
        $ans[] = $minHeap->extract();
    }

    return $ans;
}


print_r(sortApproximatelySortedData([
    1,2,3,5,6,4,7,8,9
],3));