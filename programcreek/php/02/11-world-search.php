<?php

function findWords($board, $words) {
    $m = count($board);
    $n = count($board[0]);
    $ans = [];

    foreach ($words AS $word) {
        $flag = false;

        for ($i = 0; $i < $m; $i ++ ) {
            for ($j = 0; $j < $n; $j ++ ) {
                $newBoard = $board;
                if (dfs($newBoard, $word, $i, $j, 0)) {
                    $flag = true;

                    foreach($newBoard AS $row) {
                        echo implode(" ", $row) . "\n";
                    }
                    echo "\n";

                    break 2;
                }
            }

        }
        if ($flag) $ans[] = $word;

    }

    return $ans;
}


function dfs(&$board, $word, $i, $j, $k) {

    $m = count($board);
    $n = count($board[0]);

    if ($i < 0 || $i >= $m || $j < 0 || $j >= $n || $k >= strlen($word) ) {
        return false;
    }

    if ($board[$i][$j] == $word{$k}) {
        $temp = $board[$i][$j];
        $board[$i][$j] = '#';

        if ($k == strlen($word) - 1) {
            return true;
        }
        else if ( dfs($board, $word, $i - 1, $j, $k + 1) ||
            dfs($board, $word, $i + 1, $j, $k + 1) ||
            dfs($board, $word, $i, $j - 1, $k + 1) ||
            dfs($board, $word, $i, $j + 1, $k + 1)

        ) {
            $board[$i][$j] = $temp;
            return true;
        }
    }

    return false;

}


print_r(findWords([
    ['o','a','a','n'],
    ['e','t','a','e'],
    ['i','h','k','r'],
    ['i','f','l','v']
],  ["oath","pea","eat","rain"] ));