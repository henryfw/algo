<?php


function shellSort(&$inputs) {
    $inc = floor(count($inputs) / 2);
    while ($inc > 0) {
        for ($i = $inc; $i < count($inputs); $i ++ ) {
            $j = $i;
            $temp = $inputs[$i];
            while ($j >= $inc && $inputs[$j - $inc] > $temp) {
                $inputs[$j] = $inputs[$j - $inc];
                $j -= $inc;
            }
            $inputs[$j] = $temp;
        }
        if ($inc == 2) $inc = 1;
        else $inc = floor( $inc * 5/9 );
    }
}


$inputs = [0,3,10,5,2,1,99];
shellSort($inputs);
print_r($inputs);


$inputs = [1,2,3,4,5,6,7,9,8];
shellSort($inputs);
print_r($inputs);

$inputs = [10,9,8,7,6];
shellSort($inputs);
print_r($inputs);

$inputs = [1,2,3,4,5,6,100,7,101,8];
shellSort($inputs);
print_r($inputs);