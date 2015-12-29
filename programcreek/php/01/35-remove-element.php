<?php

function removeElement(&$inputs, $t) {
    $i = 0; $j = 0;

    while ($j < count($inputs)) {
        if ($inputs[$j] != $t) {
            $inputs[$i] = $inputs[$j];
            $i ++;
            $j ++;
        }
        else {

            $j ++;
        }
    }

    return $i;
}