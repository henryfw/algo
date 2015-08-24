<?php

function findDup($A, $k) {

    $table = array();

    $counter = 0;

    for ($i = 0; $i < count($A); $i ++) {

        $value = $A[$i];

        if (!isset($table[$value])) {
            $table[$value] = [];
        }
        else {
            for ($j = 0; $j < count($table[$value]); $j ++ ) {
                if ( $i - $j <= $k ) {
                    $counter ++;

                    if ($counter > 1) {
                        return 0;
                    }
                }
            }
        }
        $table[$value][] = $i;
    }

    return $counter == 1 ? 1 : 0;

}



print_r( findDup([1,2,3,4,5,6,7,8,1,10], 999). "\n\n");
print_r( findDup([1,2,3,4,5,6,7,8,1,10,2], 999). "\n\n");
print_r( findDup([1,2,3,4,5,6,7,8,1,10], 3). "\n\n");




