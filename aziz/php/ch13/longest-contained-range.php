<?php


function longestContainedRange($inputs) {
    $unprocessed = [];
    foreach($inputs AS $i) {
        $unprocessed[$i] = 1;
    }

    $maxIntervalSize = 0;
    while(!empty($unprocessed)) {
        $a = null;
        foreach($unprocessed AS $k => $v) {
            $a = $k;
            echo "$a \n";
            print_r($unprocessed);
            break;
        }
        unset($unprocessed[$a]);

        $lowerBound = $a - 1;
        while (isset($unprocessed[$lowerBound])) {
            unset($unprocessed[$lowerBound]);
            $lowerBound --;
        }

        $upperBound = $a + 1;

        while (isset($unprocessed[$upperBound])) {
            unset($unprocessed[$upperBound]);
            $upperBound ++;
        }

        $maxIntervalSize = max($upperBound - $lowerBound - 1, $maxIntervalSize);
    }
    return $maxIntervalSize;
}

echo longestContainedRange([3,-2,7,9,8,1,2,0,-1,5,8]); // 6
