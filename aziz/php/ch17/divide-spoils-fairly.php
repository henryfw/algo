<?php
// not sure if this is right
function minimizeDifference($A) {

    $sum = array_sum($A);

    $isOk = [0 => true];

    foreach($A as $item) {


        for($v = floor($sum/2); $v >= $item; $v -- ) {
            if (isset($isOk[intval($v - $item)])) {
                $isOk[intval($v)] = true;
            }
        }

    }


    print_r($isOk);

    for ($i = floor($sum/2); $i > 0; $i --) {
        if (isset($isOk[$i])) {
            echo "sum: $sum, sum-i: " .($sum-$i). ", i: $i\n";
            return ($sum - $i) - $i;
        }
    }

    return $sum;
}



echo minimizeDifference([510,200,290]);