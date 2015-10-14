<?php

function smallestSubarrayCoveringSequentialSet($inputs, $set)
{
    $keywordToIndex = []; // hash
    $lastOccurrence = []; // array
    $shortestSubarrayLength = []; // array

    for ($i = 0; $i < count($set); $i ++ ) {
        $word = $set[$i];
        $lastOccurrence[] = -1;
        $shortestSubarrayLength[] = PHP_INT_MAX;
        $keywordToIndex[$word] = $i;
    }

    $shortestDistance = PHP_INT_MAX;
    $result = [-1, -1];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $word = $inputs[$i];
        $keywordIndex = isset($keywordToIndex[$word]) ? $keywordToIndex[$word] : null;
        if ($keywordIndex !== null) {
            if ($keywordIndex == 0) {
                $shortestSubarrayLength[0] = 1;
            }
            else if ($shortestSubarrayLength[$keywordIndex - 1] != PHP_INT_MAX) {
                $distanceToPrevKeyword = $i - $lastOccurrence[$keywordIndex - 1];
                $shortestSubarrayLength[$keywordIndex] = $distanceToPrevKeyword + $shortestSubarrayLength[$keywordIndex - 1];
            }
            $lastOccurrence[$keywordIndex] = $i;

            if ($keywordIndex == count($set) - 1 && $shortestSubarrayLength[count($shortestSubarrayLength) - 1] < $shortestDistance) {
                $shortestDistance = $shortestSubarrayLength[count($shortestSubarrayLength) - 1];
                $result[0] = $i - $shortestDistance + 1;
                $result[1] = $i;
            }
        }
    }
    return $result;
}

$inputs = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "2", "4", "6", "10", "10", "10", "3", "2", "1", "0"];
$set = ["0", "2", "9", "4", "6"];

print_r(smallestSubarrayCoveringSequentialSet($inputs, $set));