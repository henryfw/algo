<?php

function permutation($str) {

    $ans = doPermutation($str, strlen($str) - 1);


    return $ans;


}

function doPermutation($str, $index) {

    if ($index == 0) {
        return array($str{0});
    }

    $ans = doPermutation($str, $index - 1);

    $newAns = [];
    foreach($ans AS $item) {
        for ($i = 0, $ii = strlen($item); $i <= $ii; $i ++) {
            $newItem = substr($item, 0, $i) . $str{$index} . substr($item, $i);
            $newAns[] = $newItem;
        }
    }
    return $newAns;
}



print_r(permutation('abcd'));