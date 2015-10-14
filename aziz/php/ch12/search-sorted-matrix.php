<?php

function searchSortedMatrix($inputs, $target) {
    $row = 0;
    $col = count($inputs) - 1;

    while ($row < count($inputs) && $col > 0) {
        if ($inputs[$row][$col] == $target) return true;

        else if ($inputs[$row][$col] < $target) $row ++;
        else $col --;
    }

    return false;
}