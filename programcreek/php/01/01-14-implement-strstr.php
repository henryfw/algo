<?php


function str_str($haystack, $needle) {

    $needleLength = strlen($needle);
    $haystackLength = strlen($haystack);

    if ( $needleLength > $haystackLength ) return -1;

    if ($needle == '' || $haystack == '') return -1;

    $needleCounter = 0;

    for ($i = 0; $i < $haystackLength; $i ++) {

        if ($haystack{$i} == $needle{$needleCounter}) {
            if ($needleCounter == $needleLength - 1) {
                return $i - $needleCounter;
            }
            $needleCounter ++;
        }
        else {
            $needleCounter = 0;
        }

    }

    return -1;
}


echo str_str("abcdef", "a") . "\n\n";
echo str_str("abcdef", "bc") . "\n\n";
echo str_str("abcdef", "cdefg") . "\n\n";