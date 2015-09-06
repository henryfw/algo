<?php


// Box class is represented by an integer
// uncached running time is O(2^n)
// for this type of uncached recursion, the running time is
// a^n where 'a' is the number of self referenced calls + 1
$counter = 0;
$cache = [];
function createStack(array $boxes, $bottom) {
    global $counter, $cache;
    $counter ++;

    if (isset($cache[$bottom]) && 0) {
        return $cache[$bottom];
    }

    $maxHeight = 0;
    $bestStack = [];

    for ($i = 0; $i < count($boxes); $i ++ ) {
        if ($boxes[$i] > $bottom) {
            $newStack = createStack($boxes, $boxes[$i]);
            $newHeight = array_sum($newStack);
            if ($newHeight > $maxHeight) {
                $maxHeight = $newHeight;
                $bestStack = $newStack;
            }
        }
    }

    if (!$bestStack) { $bestStack = []; }
    array_unshift($bestStack, $bottom);

    $cache[$bottom] = $bestStack;

    return $bestStack;
}


print_r(createStack([1,2,3,4,5,6,7,8,9], 1));
echo $counter;