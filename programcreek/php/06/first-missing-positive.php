<?php
// i don't get this top one here.
function findMissing($inputs) {
    $n = count($inputs);
    echo implode(" ", $inputs) . "\n\n";


    for ($i = 0; $i < $n; $i ++ ) {
        while ($inputs[$i] != $i + 1) {
            if ($inputs[$i] <= 0 || $inputs[$i] >= $n) break;

            if ($inputs[$i] == $inputs[$inputs[$i] - 1]) break;

            $t = $inputs[$i];

            echo "i: $i, inputs[i]=t: {$inputs[$i]}, inputs[t-1]: {$inputs[$t - 1]}\n";

            $inputs[$i] = $inputs[$t - 1];
            $inputs[$t - 1] = $t;
            echo implode(" ", $inputs) . "\n\n";

        }
    }

    print_r($inputs);

    for ($i = 0; $i < $n; $i ++) {
        if ($inputs[$i] != $i + 1) {
            return $i + 1;
        }
    }

    return $n + 1;
}

$inputs = [6,7,8,9,10,1,2,0,3,5,11,12,13,4,15];
//echo findMissing($inputs) . "\n";

function findMissingXor($inputs) {
    $min = PHP_INT_MAX;
    $max = -PHP_INT_MAX;
    $xorInputs = 0;

    foreach($inputs AS $v) {
        if ($v < $min) $min = $v;
        if ($v > $max) $max = $v;
        $xorInputs ^= $v;
    }

    $xorSum = 0;
    for ($i = $min; $i <= $max; $i ++ ) {
        $xorSum ^= $i;
    }

    $ans = $xorInputs ^ $xorSum;
    if ($ans == 0) return $max + 1;
    else return $ans;
}

echo findMissingXor($inputs) . "\n";
