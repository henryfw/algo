<?php

function getFirstRowsPascalsTriangle($n) {
    $ans = [];

    for ($i = 0; $i < $n; $i ++ ){
        $row = [];
        for ($j = 0; $j <= $i; $j ++) {
            if (0 < $j && $j < $i) {
                $row[] = $ans[count($ans) - 1][$j - 1] + $ans[count($ans) - 1][$j];
            }
            else $row[] = 1;
        }
        $ans[] = $row;
    }
    return $ans;
}

print_r(getFirstRowsPascalsTriangle(10));