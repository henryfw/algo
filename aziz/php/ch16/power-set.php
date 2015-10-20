<?php

// use this. much better
function powerSetIterative($inputs) {

    $ans = [[]];

    foreach($inputs AS $char) {
        for($i = 0, $l = count($ans); $i < $l; $i ++) {
            $tmp = array_merge($ans[$i], [$char]);
            sort($tmp);
            $ans[] = $tmp;
        }
    }

    return $ans;
}


// from book
function powerSet($inputs) {
    $ans = [];
    $selectedSoFar = [];
    helper($inputs, 0, $selectedSoFar, $ans);
    return $ans;
}

function helper($inputs, $toBeSelected, &$selectedSoFar, &$ans) {
    if ($toBeSelected == count($inputs) ) {
        $tmp = $selectedSoFar;
        sort($tmp);
        $ans[] = $tmp;
        return;
    }
    // Generate all subsets that contain inputSet[toBeSelected].
    $selectedSoFar[] = $inputs[$toBeSelected];
    helper($inputs, $toBeSelected + 1, $selectedSoFar, $ans);

    // Generate all subsets that do not contain inputSet[toBeSelected].
    array_pop($selectedSoFar);
    helper($inputs, $toBeSelected + 1, $selectedSoFar, $ans);
}

$inputs = [1,2,3,4];

$ans = powerSet($inputs);
$ansIter = array_reverse(powerSetIterative($inputs));



$hash = [];
foreach($ans AS $i) {
    $hash[implode('-', $i)] = 1;
}
foreach($ansIter AS $i) {
    unset($hash[implode('-', $i)]);
}

var_dump(empty($hash));

print_r($ans);
print_r($ansIter);

