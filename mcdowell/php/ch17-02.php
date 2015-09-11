<?php

// $board[row][col] = 0, 1, or 2
function checkWin($board) {
    $l = count($board[0]);

    // check x
    for($i = 0; $i < $l; $i ++) {
        if ($board[$i][0] == 0) continue;
        for($j = 1; $j < $l; $j ++) {
            if ($board[$i][$j] != $board[$i][$j-1]) break;
        }
        return $board[$i][0];
    }


    // check y
    for($i = 0; $i < $l; $i ++) {
        if ($board[0][$i] == 0) continue;
        for($j = 1; $j < $l; $j ++) {
            if ($board[$j][$i] == $board[$j - 1][$i]) break;
        }
        return $board[0][$i];
    }


    // check diagonal
    if ($board[0][0] != 0)  {
        for($i = 1; $i < $l; $i ++) {
            if ($board[$i][$i] != $board[$i - 1][$i - 1]) break;
        }
        return $board[0][0];
    }




    // check opposite diagonal
    if ($board[0][$l-1] != 0)  {
        for($i = 1; $i < $l; $i ++) {
            if ($board[$i][$l - $i - 1] != $board[$i - 1][$l - $i]) break;
        }
        return $board[0][$l - 1];
    }



    return 0;

}


echo checkWin([
    [0, 0, 1],
    [0, 1, 1],
    [1, 0, 1],
]);

echo checkWin([
    [0, 0, 1],
    [1, 1, 1],
    [0, 0, 0],
]);

echo checkWin([
    [0, 0, 1],
    [1, 0, 1],
    [0, 0, 1],
]);
echo checkWin([
    [1, 0, 1],
    [1, 1, 0],
    [0, 0, 1],
]);