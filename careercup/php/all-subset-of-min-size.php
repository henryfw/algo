<?php

// http://www.careercup.com/question?id=10018885


function powerSet($inputs, $minSize) {

    $ans = [[]];

    foreach($inputs AS $char) {
        for($i = 0, $l = count($ans); $i < $l; $i ++) {
            $ans[] = array_merge($ans[$i], [$char]);
        }
    }

    return array_filter($ans, function($a) use ($minSize){
        return count($a) >= $minSize;
    });

}



print_r(powerSet([1,2,3,4,5,6,7], 3));

