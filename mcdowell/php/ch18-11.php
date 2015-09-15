<?php
/*
 * n^4 run time
 *
 * to get n^3:

if A[r][c] is white, zeros right and zeros below are 0
else A[r][c].zerosRight = A [ r ] [c + 1].zerosRight + 1
A[r][c].zerosBelow = A[r + 1][c].zerosBelow + 1

 * then check the corners for the top, bottom, left, right borders
 */

function findSubsquare($inputs) {
    for ($i = count($inputs); $i > 0; $i --) {
        $ans = findSubsquareOfSize($inputs, $i);
        if ($ans) return $ans;
    }
}

function findSubsquareOfSize($inputs, $size) {
    $count = count($inputs) - $size;
    for ($row = 0; $row <= $count; $row ++ ) {
        for ($col = 0; $col <= $count; $col ++) {
            if (isSquare($inputs, $row, $col, $size)) {
                return new Subsquare($row, $col, $size);
            }
        }
    }
    return null;
}

function isSquare($inputs, $row, $col, $size) {
    for ($j = 0; $j < $size; $j ++) {
        if ($inputs[$row][$col + $j] == 1) {
            return false;
        }
        if ($inputs[$row + $size - 1][$col + $j] == 1) {
            return false;
        }
    }
    for ($i = 0; $i < $size; $i ++) {
        if ($inputs[$row + $i][$col] == 1) {
            return false;
        }
        if ($inputs[$row + $i][$col + $size - 1] == 1) {
            return false;
        }
    }
    return true;
}

class Subsquare {
    public $row;
    public $col;
    public $size;
    public function __construct($row, $col, $size) {
        $this->row = $row;
        $this->col = $col;
        $this->size = $size;
    }
}

$inputs = [
  [1, 1, 0, 0, 0],
  [0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0],
  [0, 0, 0, 0, 0],
];
var_dump(findSubsquare($inputs));