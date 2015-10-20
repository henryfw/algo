<?php

function intersectionOfSortedArraysSlow($a, $b) {
    $ans = [];

    for($i = 0; $i < count($a); $i ++) {
        if ($i == 0 || $a[$i] != $a[$i - 1] ) {
            foreach($b AS $bValue) {
                if ($a[$i] == $bValue) {
                    $ans[] = $bValue;
                    break;
                }
            }
        }
    }

    return $ans;
}



function intersectionOfSortedArraysFast($a, $b) {
    $ans = [];

    $i = 0; $j = 0;

    while($i < count($a) && $j < count($b)) {
        if ($a[$i] == $b[$j] && ($i == 0 || $a[$i] != $a[$i - 1])) {
            $ans[] = $a[$i];
            $i ++;
            $j ++;
        }
        else if ($a[$i] < $b[$j]) {
            $i ++;
        }
        else {
            $j ++;
        }
    }
    return $ans;

}

$a = [1,2,3,4,5,6,7,8,9];
$b = [5,6,8];
print_r(intersectionOfSortedArraysSlow($a, $b));
print_r(intersectionOfSortedArraysFast($a, $b));

