<?php

function partition(&$inputs, $left, $right, $pivot) {
    while ($left <= $right) {
        while ( $inputs[$left] <= $pivot) {
            $left ++;
        }
        while ( $inputs[$right] > $pivot) {
            $right --;
        }

        if ($left > $right) {
            return $left - 1;
        }

        $tmp = $inputs[$left];
        $inputs[$left] = $inputs[$right];
        $inputs[$right]= $tmp;
    }
}

function selectionRank(&$inputs, $left, $right, $rank) {
    $pivot = $inputs[rand($left, $right)];

    $leftEnd = partition($inputs, $left, $right, $pivot);

    $leftSize = $leftEnd - $left + 1;
    if ($leftSize == $rank + 1) {
        return max(array_slice($inputs, $left, $leftEnd + 1));
    }
    else if ($rank < $leftSize) {
        return selectionRank($inputs, $left, $leftEnd, $rank);
    }
    else {
        return selectionRank($inputs, $leftEnd + 1, $right, $rank - $leftSize);
    }

}

$a = [51,62,73,4,5,11,23,455,67,89];
echo selectionRank($a, 0, count($a) - 1,  1);


