<?php


function flipColor($inputs, $x, $y) {
    $shifts = [[0,1], [0,-1], [1,0], [-1,0]];

    $color = $inputs[$x][$y];

    $q = [];

    $inputs[$x][$y] = !$inputs[$x][$y];

    $q[] = [$x, $y];

    while(!empty($q)) {
        $cur = $q[0];
        foreach($shifts AS $shift) {
            $next = [$cur[0] + $shift[0], $cur[1] + $shift[1]];

            if ($next[0] >= 0 && $next < count($inputs)
                && $next[1] >=0 && $next < count($inputs[0])
                && $inputs[$next[0]][$next[1]] == $color) {

                $inputs[$next[0]][$next[1]] = !$inputs[$next[0]][$next[1]];
                $q[] = $next;
            }
        }
        array_shift($q);
    }

}

