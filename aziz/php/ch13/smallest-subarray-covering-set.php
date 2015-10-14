<?php

/**
 * @param $inputs array
 * @param $set array
 */
function smallestSubarrayCoveringSet($inputs, $set) {
    $keywordsToCount = [];
    $left = 0;
    $right = 0;

    $result = [-1, -1];


    while($right < count($inputs)) {

        // Keeps advancing right until it reaches end or keywordsToCount has
        // all keywords.
        while($right < count($inputs) &&
            count($keywordsToCount) < count($set)) {

            $word = $inputs[$right];

            if (isset($set[$word])) {
                if (!isset($keywordsToCount[$word])) {
                    $keywordsToCount[$word] = 0;
                }
                $keywordsToCount[$word] ++;
            }
            $right ++;
        }

        // Found all keywords, update the smallest subarray containing all keywords.
        if (count($keywordsToCount) == count($set) &&
            (($result[0] == -1 && $result[1] == -1) ||
                $right - 1 - $left < $result[1] - $result[0]
            )) {

            $result[0] = $left;
            $result[1] = $right - 1;
        }


        // Keeps advancing left until it reaches end or keywordsToCount does not
        // have all keywords.
        while ( $left < $right && count($keywordsToCount) == count($set)) {
            $word = $inputs[$left];
            if (isset($set[$word])) {
                $keywordsToCount[$word] --;
                if ($keywordsToCount[$word] == 0) {
                    unset($keywordsToCount[$word]);
                    if (($result[0] == -1 && $result[1] == -1) ||
                        $right - 1 - $left < $result[1] - $result[0]) {

                        $result[0] = $left;
                        $result[1] = $right -1;
                    }
                }

            }
            $left ++;
        }

    }
    return $result;
}


print_r(smallestSubarrayCoveringSet(["a", "b", "a", "a", "d", "c", "a", "d", "b", "a", "c", "d"], ['b' => true, 'c' => true]));