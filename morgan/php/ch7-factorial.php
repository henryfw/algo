<?php

function allFactorials($n) {
    $results = [];

    doAllFactorials($n, $results, 0);

    return $results;
}


function doAllFactorials($n, &$results, $level) {
    if ($n > 1) {
        $results[$level] = $n * doAllFactorials($n - 1, $results, $level + 1);
        return $results[$level];
    }
    else {
        $results[$level] = 1;
        return 1;
    }
}


print_r(allFactorials(5));


function iterativeFactorial($n) {
    $ans = 1;

    while($n > 1) {
        $ans *= $n;
        $n --;
    }

    return $ans;
}

print_r(iterativeFactorial(5));