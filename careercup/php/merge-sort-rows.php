<?php


/* http://www.careercup.com/question?id=5768186823704576

This is m-way merging of m sorted arrays. It can be solved using min-heap
(priority queue) with size m, in O(mn log m) time.

*/


function mergeSortRows($inputs) {
    $rowCount = count($inputs);
    $colCol = count($inputs[0]);
    $minHeap = new SplMinHeap();
    $inputSizes = [];
    for ($i = 0; $i < $rowCount; $i ++) {
        $inputSizes[$i] = $colCol;
        $minHeap->insert($inputs[$i][0]);
    }

    $ans = [];

    while (  $minHeap->count() > 0 ) {
        $smallest = $minHeap->extract();

        // find which row to remove
        for ($i = 0; $i < $rowCount; $i ++) {
            $targetIndex = $colCol - $inputSizes[$i];
            if ($smallest == $inputs[$i][ $targetIndex ]) {
                $inputSizes[$i] --;
                $ans[] = $smallest;
                if ($targetIndex + 1 < $colCol) {
                    $minHeap->insert($inputs[$i][$targetIndex + 1]);
                }
                break;
            }
        }

     }

    return $ans;
}


print_r(mergeSortRows([
    [20, 40, 80],
    [5, 60, 90],
    [45, 50, 55],
]));