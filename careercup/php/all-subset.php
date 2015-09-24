<?php
// http://www.careercup.com/question?id=6268663

// powerset



function getSubset($inputs) {


    if (count($inputs) == 1) {
        return [ $inputs ];
    }

    $last = array_pop($inputs);
    $data = getSubset($inputs);

    $ans = $data;
    foreach($data AS $row) {
        $newRow = $row;
        array_splice($newRow, 0, 0, $last);
        $ans[] = $newRow;
    }
    return $ans;
}



$ans = getSubset([1,2,3]);

print_r($ans);