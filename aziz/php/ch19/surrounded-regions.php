<?php

function fillSurroundedRegions($inputs) {
    if (empty($inputs)) return;

    $visited = [];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $visited[] = array_fill(0, count($inputs[$i]), false);
    }

    for ($i = 1; $i < count($inputs) - 1; $i ++ ) {
        for ($j = 1; $j < count($inputs[$i]) - 1; $j ++ ) {
            if ($inputs[$i][$j] == 'W' && !$visited[$i][$j]) {
                markRegionIfSurrounded($i, $j, $inputs, $visited);
            }
        }
    }
}


function markRegionIfSurrounded($i, $j, &$inputs, $visited) {

    $shifts = [[0,1], [0,-1], [1,0], [-1,0]];

    $q = [];

    $q[] = [$i, $j];

    $visited[$i][$j] = true;

    $isSurrounded = true;

    $index = 0;

    while ($index < count($q)) {
        $cur = $q[$index ++ ];

        if ($cur[0] == 0 || $cur[0] == count($inputs) - 1 || $cur[1] == 0
            || $cur[1] == count($inputs[$cur[0]]) - 1) {
            $isSurrounded = false;
        }
        else {
            foreach($shifts AS $shift) {
                $next = [$cur[0] + $shift[0], $cur[1] + $shift[1]];

                if ($inputs[$next[0]][$next[1]] == 'W' && !$visited[$next[0]][$next[1]]) {
                    $visited[$next[0]][$next[1]] = true;
                    $q[] = $next;
                }
            }
        }
    }

    if ($isSurrounded) {
        foreach($q AS $p) {
            $inputs[$p[0]][$p[1]] = 'B';
        }
    }
}