<?php

//  http://www.careercup.com/question?id=6204973461274624


// http://algorithms.tutorialhorizon.com/print-all-combinations-of-subset-of-size-k-from-given-array/

function allSubSetOfSizeK($input, $k) {

    function subset($input, $k, $start, $currentLength, &$used) {

        if ($currentLength == $k) {
            for ($i = 0; $i < count($input); $i ++) {
                if ($used[$i]) {
                    echo $input[$i];
                }
            }
            echo "\n";
            return;
        }

        if ($start == count($input)) return;

        $used[$start] = true;
        subset($input, $k, $start + 1, $currentLength + 1, $used);
        $used[$start] = false;
        subset($input, $k, $start + 1, $currentLength, $used);

    }

    $used = [];
    subset($input, $k, 0, 0, $used);
}


allSubSetOfSizeK([1,2,3,4,5], 3);
