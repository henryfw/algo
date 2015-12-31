<?php


function solve($inputs) {
    $m = count($inputs);
    $n = count($inputs[0]);
    $queue = new SplDoublyLinkedList();

    // left and right
    for ($i = 0; $i < $m; $i ++ ) {
        if ($inputs[$i][0] == 'o') {
            bfs($inputs, $i, 0, $queue);
        }
        if ($inputs[$i][$n - 1] == 'o') {
            bfs($inputs, $i, $n - 1, $queue);
        }
    }

    // top and bottom
    for ($j = 0; $j < $n; $j ++) {
        if ($inputs[0][$j] == 'o') {
            bfs($inputs, 0, $j, $queue);
        }
        if ($inputs[$m - 1][$j] == 'o') {
            bfs($inputs, $m - 1, $j, $queue);
        }
    }

    // rest
    for ($i = 0; $i < $m; $i ++ ) {
        for ($j = 0; $j < $n; $j ++) {
            if ($inputs[$i][$j] == 'o') {
                $inputs[$i][$j] = 'x';
            }
            else if ($inputs[$i][$j] == '#') {
                $inputs[$i][$j] = 'o';
            }
        }
    }


}


function bfs(&$inputs, $i, $j, SplDoublyLinkedList $queue) {
    $n = count($inputs[0]);

    // fill current
    fillCell($inputs, $i, $j, $queue);

    while($queue->count() > 0) {
        $cur = $queue->shift();
        $x = floor($cur / $n);
        $y = $cur % $n;

        fillCell($inputs, $x - 1, $y, $queue);
        fillCell($inputs, $x + 1, $y, $queue);
        fillCell($inputs, $x, $y + 1, $queue);
        fillCell($inputs, $x, $y - 1, $queue);
    }
}


function fillCell(&$inputs, $i, $j, SplDoublyLinkedList $queue) {
    $m = count($inputs);
    $n = count($inputs[0]);

    if ($i < 0 || $i >= $m || $j < 0 || $j >= $n || $inputs[$i][$j] != 'o') return;

    $queue->push($i * $n + $j);
    $inputs[$i][$j] = '#';
}

