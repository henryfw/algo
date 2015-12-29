<?php

function minWindowSubstring($inputs, $target) {
    if (strlen($target) > strlen($inputs)) return "";

    $ans = "";


    // number of chars needed for target
    $targetMap = [];
    for ($i = 0; $i < strlen($target); $i ++ ) {
        $c = $target{$i};
        if (!isset($targetMap[$c])) {
            $targetMap[$c] = 1;
        }
        else {
            $targetMap[$c] ++;
        }
    }

    print_r($targetMap);

    // number of mapped chars from input on target
    $inputsMap = [];

    $left = 0;

    $minLen = strlen($inputs) + 1;

    $mappedCount = 0;



    for ($i = 0; $i < strlen($inputs) ; $i ++ ) {

        $c = $inputs{$i};


        if (isset($targetMap[$c])) {
            if (isset($inputsMap[$c])) {
                if ($inputsMap[$c] < $targetMap[$c]) {
                    $mappedCount ++;
                }
                $inputsMap[$c] ++;
            }
            else {
                $inputsMap[$c] = 1;
                $mappedCount ++;
            }
        }
    }


    if ($mappedCount == strlen($target)) {
        $inputC = $inputs{$left};


        while(!isset($inputsMap[$inputC]) || $inputsMap[$inputC] > $targetMap[$inputC]) {

            if ($inputsMap[$inputC] > $targetMap[$inputC]) {
                $inputsMap[$inputC] --;
            }
            $left ++;
            $inputC = $inputs{$left};

        }

        if ($i - $left + 1 < $minLen) {
            $ans = substr($inputs, $left, $i - $left + 1);
            $minLen = $i - $left + 1;
        }
    }

    return $ans;

}

echo minWindowSubstring("ADOBECODEBANC","ABC"); //, Minimum window is "BANC".