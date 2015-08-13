<?php


function shell_sort(&$inputs) {

    $increment = (int) (count($inputs) / 2);

    while ($increment > 0) {

        for ($i = $increment; $i < count($inputs); $i ++) {

            $tmp = $inputs[$i];
            $to_insert_index = $i;

            for ($j = $i; $j >= $increment; $j -= $increment) {
                if ($tmp < $inputs[$j - $increment] ) {
                    $inputs[$j] = $inputs[$j - $increment];
                    $to_insert_index = $j - $increment;
                }
                else {
                    break;
                }
            }

            $inputs[$to_insert_index] = $tmp;
        }

        if ($increment == 2) {
            $increment = 1;
        }
        else {
            $increment = (int) ( $increment * 5/11 );
        }

    }


}




$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];


shell_sort($inputs);

print_r($inputs);
