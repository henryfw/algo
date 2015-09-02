<?php

function countWays($n, &$map) {
    if ($n < 0) return 0;
    if ($n == 0) return 1;
    else {
        if (isset($map[$n])) {
            return $map[$n];
        }
        else {
            $ans = countWays($n - 1, $map) + countWays($n - 2, $map) + countWays($n - 3, $map);
            $map[$n] = $ans;
            return $ans;
        }
    }
}

$map = array();
echo countWays(100, $map);