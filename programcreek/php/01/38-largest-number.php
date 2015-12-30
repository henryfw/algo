<?php



function largestNumber($inputs) {
    usort($inputs, function($a, $b) {
        $a = $a . "";
        $b = $b . "";

        return - strcmp($a.$b, $b.$a);
    });

    print_r($inputs);

    return implode("", $inputs);
}


echo largestNumber([3, 30, 34, 5, 9]);