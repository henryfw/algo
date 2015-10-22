<?php
error_reporting(E_ALL & ~E_NOTICE);


function traverse2dArray($n, $m) {
    if ($n < $m) list($n, $m) = [$m, $n];

    $A = array_fill(0, $m, 1);

    for ($i = 1; $i < $n; $i ++ ){
        $prevRes = 0;

        for($j = 0; $j < $m; $j ++ ) {
            echo "i: $i, j: $j, prev: $prevRes, oldAj: {$A[$j]}, newAj: " . ($A[$j] + $prevRes) . "\n";
            $A[$j] = $A[$j] + $prevRes;
            $prevRes = $A[$j];
        }
        echo "\nafter $i pass\n";
        print_r($A);
    }

    print_r($A);

    return $A[$m - 1];
}

echo traverse2dArray(5,5);

