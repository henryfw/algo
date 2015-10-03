<?php
// http://www.careercup.com/question?id=9097380

function findMinSetThatSumsToK($inputs, $k) {
    $sorted = $inputs;
    $l = count($inputs);

    $selected = [];

    $i = 0;
    while($i < $l) {
        $selected[] = $sorted[$i];

        if (array_sum($selected) >= $k) return $selected;
        $i ++;
    }

    return null;

}

function countingSort($inputs) {
    $l = count($inputs);

    $max = max($inputs);
    $min = min($inputs);

    $data = array_fill($min, $max - $min + 1, 0);

    foreach ($inputs AS $i) {
        $data[$i] ++;
    }

    $ans = [];
    foreach($data AS $k => $v) {
        for($i = 0; $i < $v; $i ++) {
            $ans[] = $k;
        }
    }

    return $ans;
}


print_r(findMinSetThatSumsToK([1,1,2,3,4,5,5,6,8], 3));