<?php

function radixSort($inputs) {
    // find max width
    $width = 0;
    $l = count($inputs);

    foreach($inputs AS $v) {
        $tmp = floor( log10($v) ) + 1;
        if ($tmp > $width) $width = $tmp;
    }

    $ans = $inputs;

    for ( $widthIndex = 0; $widthIndex < $width; $widthIndex ++) {

        $bins = [];
        for ( $i = 0; $i <= 9; $i ++) {
            $bins[$i] = [];
        }

        for ($i = 0; $i < $l; $i ++) {

            // place in bin
            $digitToLookAt = floor($ans[$i] / pow(10, $widthIndex)) % 10;

            // put in bin
            $bins[$digitToLookAt][] = $ans[$i];

        }

        // playback
        $ans = [];
        for ( $i = 0; $i <= 9; $i ++) {
            $ans = array_merge($ans, $bins[$i]);
        }
    }

    return $ans;
}


print_r(radixSort([100,99,1,22,222,2,5,15]));