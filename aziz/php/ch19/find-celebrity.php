<?php


function celebrityFinding($inputs) {
    $i = 0; // selected celeb
    $j = 1; // to be check if celeb


    while ($j < count($inputs)) {

        if ($inputs[$i][$j]) {
            $i = $j ++;
        }
        else {
            $j ++;
        }

    }

    return $i;
}