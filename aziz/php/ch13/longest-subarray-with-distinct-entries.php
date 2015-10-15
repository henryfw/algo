<?php



function longestSubarrayDistinctEntries($inputs) {

    $mostRecentOccurrence = [];

    $longestDupFreeSubarrayStartIndex = 0;
    $result = 0;

    for ($i = 0; $i < count($inputs); $i ++ ) {
        print_r($mostRecentOccurrence);
        echo "{$inputs[$i]} before longestIndex $longestDupFreeSubarrayStartIndex, result $result\n";
        $dupIndex = isset($mostRecentOccurrence[$inputs[$i]]) ? $mostRecentOccurrence[$inputs[$i]] : null;
        $mostRecentOccurrence[$inputs[$i]] = $i;

        if ($dupIndex !== null) {
            if ($dupIndex >= $longestDupFreeSubarrayStartIndex) {
                $result = max($result, $i - $longestDupFreeSubarrayStartIndex);
                $longestDupFreeSubarrayStartIndex = $dupIndex + 1;
            }
        }
        echo "after longestIndex $longestDupFreeSubarrayStartIndex, result $result\n";
    }

    $result = max($result, count($inputs) - $longestDupFreeSubarrayStartIndex);

    return $result;
}

echo longestSubarrayDistinctEntries([1,2,1,3,1,2,1]); //3
