<?php


function permutation($inputs) {
    $ans = [[]];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $current = [];

        foreach ($ans AS $item) {
            for ($j = 0; $j <= count($item); $j ++ ) {
                $copy = $item;
                array_splice($copy, $j, 0, $inputs[$i]);
                $current[] = $copy;
            }
        }

        $ans = $current;
    }

    return $ans;
}


print_r(permutation([1,2,3]));