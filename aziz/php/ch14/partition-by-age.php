<?php

function partitionByAge(&$inputs) {
    $ageToCount = [];
    foreach($inputs AS $item) {
        if (isset($ageToCount[$item[1]])) {
            $ageToCount[$item[1]]++;
        }
        else {
            $ageToCount[$item[1]] = 1;
        }
    }
    $ageToOffset = [];

    $offset = 0;

    foreach($ageToCount AS $age => $count) {
        $ageToOffset[$age] = $offset;
        $offset += $count;
    }

    while (!empty($ageToOffset)) {

        $from = reset($ageToOffset);

        $toAge = $inputs[$from][1];
        $toValue = $ageToOffset[$toAge];
        echo "fromOffset $from, toAge $toAge, moving to index $toValue\nageToOffset before ";
        foreach($ageToOffset AS $k => $v) echo "$k:$v, ";
        echo "\n";
        swap($inputs, $from, $toValue);
        $ageToCount[$toAge] --;
        if ($ageToCount[$toAge] > 0) {
            $ageToOffset[$toAge] = $toValue + 1;
        }
        else {
            unset($ageToOffset[$toAge]);
        }
        echo "ageToOffset after  ";
        foreach($ageToOffset AS $k => $v) echo "$k:$v, ";
        echo "\n";

        foreach($inputs AS $k => $v) echo "$k:$v[0], ";
        echo "\n\n";

    }
}

function swap(&$inputs, $a, $b) {
    list($inputs[$a], $inputs[$b]) = [$inputs[$b], $inputs[$a]];
}


$inputs = [
    ['A1', 1],
    ['B1', 2],
    ['C1', 3],
    ['A2', 1],
    ['B2', 2],
    ['C2', 3],
    ['A3', 1],
];

partitionByAge($inputs);

print_r($inputs);