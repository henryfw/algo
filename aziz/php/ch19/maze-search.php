<?php

class Color {
    const WHITE = 0;
    const BLACK = 1;
}

function searchMaze($maze, $start, $end) {
    $path = [];

    $maze[$start[0]][$start[1]] = Color::BLACK;

    $path[] = $start;

    if (!helper($maze, $start, $end, $path)) {
        array_pop($path);
    }

    return $path;
}



function helper(&$maze, $cur, $end, &$path) {

    if ($cur == $end) return true;

    $shifts = [[0,1], [0,-1], [1,0], [-1,0]];

    foreach($shifts AS $shift) {
        $next = [$cur[0] + $shift[0], $cur[1] + $shift[1]];

        if (isFeasible($next , $maze)) {
            $maze[$next[0]][$next[1]] = Color::BLACK;
            $path[] = $next;
            if (helper($maze, $next, $end, $path)) {
                return true;
            }
            array_pop($path);
        }
    }

    return false;
}



function isFeasible($cur, $maze) {

    return $cur[0] >= 0 && $cur[0] < count($maze) && $cur[1] >= 0
        && $cur[1] < count($maze[0]) && $maze[$cur[0]][$cur[1]] == Color::WHITE;
}


