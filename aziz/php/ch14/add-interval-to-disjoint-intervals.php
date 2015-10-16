<?php


function addInterval($inputs, $new) {
    $i = 0;
    $result = [];

    // before
    while ($i < count($inputs) && $new[0] > $inputs[$i][1]) {
        $result[] = $inputs[$i];
        $i++;
    }

    // inside
    while ($i < count($inputs) && $new[1] >= $inputs[$i][0]) {
        $new = [ min($new[0], $inputs[$i][0]) , max($new[1], $inputs[$i][1])];
        $i++;
    }
    $result[] = $new;



    // after
    $result = array_merge($result, array_slice($inputs, $i));

    return $result;
}

print_r(addInterval([[0,4],[7,11], [12,20], [100,101]], [5,13]));
