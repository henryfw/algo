<?php

function mergeKSortedList($lists) {


    $ans = [];

    while (true) {
        $listsWithContent = [];
        for ($i = 0; $i < count($lists); $i ++) {
            if (count($lists[$i])) {
                $listsWithContent[] = $i;
            }
        }
        if (empty($listsWithContent)) break;

        $minValue = null;
        $listToMove = null;
        for ($i = 0; $i < count($listsWithContent); $i ++) {
            $index = $listsWithContent[$i];
            if ($minValue === null || $lists[$index][0] < $minValue) {
                $minValue = $lists[$index][0];
                $listToMove = $index;
            }
        }

        // move it
        $ans[] = array_shift($lists[$listToMove]);


    }

    return $ans;

}



$a = [1,2,3,4,5,6,7,8];
$b = [5,6,7,8,9,10,11,12];
$c = [1,2,3,24,25,26,27,28];

$lists = [$a, $b, $c];


print_r(mergeKSortedList($lists));