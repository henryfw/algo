<?php

// http://www.careercup.com/question?id=5179916190482432

function multipleOtherIndexElements($inputs) {

    $length = count($inputs);
    if ($length == 1) return [ 0 ];
    if ($length == 0) return [];

    $ans = [];

    $lastSkippedValue = $inputs[0];

    $product = 1;
    for ($i = 1; $i < $length; $i ++) {
        $product *= $inputs[$i];
    }
    $ans[0] = $product;

    for ($i = 1; $i < $length; $i ++) {
        $ans[$i] = $ans[$i - 1] * $lastSkippedValue / $inputs[$i];
        $lastSkippedValue = $inputs[$i];
    }
    return $ans;
}

function multipleOtherIndexElementsWithNoDivide($inputs) {

    $length = count($inputs);
    if ($length == 1) return [ 0 ];
    if ($length == 0) return [];

    $before = [$inputs[0]];
    $after = array_fill(0, $length, null);
    $after[$length - 1] = $inputs[$length - 1];
    $ans = [];

    for ($i = 1; $i < $length; $i ++) {
        $before[$i] = $before[$i - 1] * $inputs[$i];
    }

    for ($i = $length - 2; $i >= 0; $i --) {
        $after[$i] = $after[$i + 1] * $inputs[$i];
    }

    for ($i = 0; $i < $length; $i ++) {
        $ans[$i] = 1;
        if (isset($before[$i - 1])) $ans[$i] *= $before[$i - 1];
        if (isset($after[$i + 1])) $ans[$i] *= $after[$i + 1];
    }

    return $ans;
}

print_r(multipleOtherIndexElementsWithNoDivide([2,3,1,4]));



