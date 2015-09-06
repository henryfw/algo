<?php


function search($inputs, $target) {
    $mid = (int) (count($inputs)/2);

    if ($inputs[$mid] == $target) return $mid;

    // left is sorted
    if ($inputs[0] < $inputs[$mid]) {
        if ($target < $inputs[$mid] && $target >= $inputs[0]) {
            $result = binarySearch($inputs, $target, 0, $mid);
            if ($result != -1) return $result;
        }
        return linearSearch(array_slice($inputs, $mid + 1), $target);

    }
    else if ($inputs[0] == $inputs[$mid]) {

        // right is sorted
        if ($inputs[$mid] < $inputs[count($inputs) -1]) {
            if ($target > $inputs[$mid] && $target <= $inputs[count($inputs) -1]) {
                $result = binarySearch($inputs, $target, $mid + 1, count($inputs) - 1);
                if ($result != -1) return $result;
            }
            else {
                return linearSearch(array_slice($inputs, 0, $mid), $target);
            }
        }
        return linearSearch($inputs, $target);
    }
    else {
        // right is sorted
        if ($target > $inputs[$mid] && $target <= $inputs[count($inputs) -1]) {
            $result = binarySearch($inputs, $target, $mid + 1, count($inputs) - 1);
            if ($result != -1) return $result;
        }
        else {

            // check left
            return linearSearch(array_slice($inputs, 0, $mid), $target);
        }
    }
}


function binarySearch($inputs, $target, $start, $end) {
    if ($start > $end) return -1;

    $mid = (int) (($start + $end)/2);
    $midValue = $inputs[$mid];
    if ($target == $midValue) return $mid;

    if ($target > $midValue) {
        return binarySearch($inputs, $target, $mid + 1, $end);
    }
    else {
        return binarySearch($inputs, $target, $start, $mid -1);
    }
}



function linearSearch($inputs, $target) {
    $ans = array_search($target, $inputs) ;
    return $ans === false ? -1 : $ans;
}


$inputs = [
    99,100,101, 1,2,3,4,5,6
];
assert(search($inputs, 100) == 1);
assert(search($inputs, 2) == 4);
assert(search($inputs, 5) == 7);
assert(search($inputs, 6) == 8);
assert(search($inputs, 7) == -1);
assert(search($inputs, 98) == -1);