<?php


function shuffleDeck(&$inputs) {
    for($i = 0; $i < count($inputs); $i++) {
        $k = floor( rand(0, $i) );
        echo "k: $k ($i) \n";
        $temp = $inputs[$k];
        $inputs[$k] = $inputs[$i];
        $inputs[$i] = $temp;
    }
}


$inputs = [1,2,3,4,5];
shuffleDeck($inputs);

print_r($inputs);