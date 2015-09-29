<?php

// http://www.careercup.com/question?id=4423692

function findMaxAreaUnderStack($inputs) {

    $maxHeight = 0;
    for ($i = 0, $ii = count($inputs); $i < $ii; $i ++) {
        $maxHeight = max($maxHeight, $inputs[$i]);
    }

    $heightData = array_fill(0, $maxHeight + 1, []); // [ (start, end) , (start, end) ]


    // try to keep a hypothetical list of heights

    for ($i = 0, $ii = count($inputs); $i < $ii; $i ++) {
        $height = $inputs[$i];
        for ($j = 0; $j <= $height; $j++) {
            if (
                empty($heightData[$j]) ||  // empty
                $heightData[$j][count($heightData[$j])-1][1] !== null // last interval ended
            ) {
                $heightData[$j][] = [$i, null]; // create new interval
            }
        }
        for ($j = $height + 1; $j <= $maxHeight; $j ++) {
            if (!empty($heightData[$j]) &&
                $heightData[$j][count($heightData[$j])-1][1] === null) // not closed
            {
                $heightData[$j][count($heightData[$j])-1][1] = $i; // close it
                // only keep the longest one
                $heightData[$j] = [ $heightData[$j][getIndexOfMaxInterval($heightData[$j])] ];
            }
        }
    }

    $bestAns = 0;

    // close all intervals
    for ($j = 0; $j <= $maxHeight; $j ++) {
        if (!empty($heightData[$j]) &&
            $heightData[$j][count($heightData[$j])-1][1] === null) // not closed
        {
            $heightData[$j][count($heightData[$j])-1][1] = $i; // close it
            $heightData[$j] = [ $heightData[$j][getIndexOfMaxInterval($heightData[$j])] ];
        }

        // now find the max area
        if (!empty($heightData[$j])) {
            $width = $heightData[$j][0][1] - $heightData[$j][0][0];
            $bestAns = max($bestAns, $width * $j);
        }
    }



    return $bestAns;
}


function getIndexOfMaxInterval($inputs) {
    if (empty($inputs)) return -1;
    $index = 0;
    $maxValue = 0;

    for ($i = 0, $ii = count($inputs); $i < $ii; $i++) {
        $interval = $inputs[$i][1] - $inputs[$i][0];
        if ($interval > $maxValue) {
            $maxValue = $interval;
            $index = $i;
        }
    }
    return $index;
}


$inputs = [5,4,3,2,1,2,3];

var_dump( findMaxAreaUnderStack($inputs) );