<?php
// http://www.careercup.com/question?id=6268663

function getSubset($inputs) {


    if (count($inputs) == 0) {
        return [ [] ];
    }

    $last = array_pop($inputs);
    $data = getSubset($inputs);

    $ans = $data;
    foreach($data AS $row) {
        $newRow = $row;
        array_splice($newRow, 0, 0, $last);
        $ans[] = $newRow;
    }
    return $ans;
}



$ans = getSubset([1,2,3,4,5]);

print_r($ans);

/*
 /usr/bin/php /Users/henry/Documents/git/algo/careercup/php/all-subset.php
Array
(
    [0] => Array
        (
            [0] => 1
        )

    [1] => Array
        (
            [0] => 2
            [1] => 1
        )

    [2] => Array
        (
            [0] => 3
            [1] => 1
        )

    [3] => Array
        (
            [0] => 3
            [1] => 2
            [2] => 1
        )

    [4] => Array
        (
            [0] => 4
            [1] => 1
        )

    [5] => Array
        (
            [0] => 4
            [1] => 2
            [2] => 1
        )

    [6] => Array
        (
            [0] => 4
            [1] => 3
            [2] => 1
        )

    [7] => Array
        (
            [0] => 4
            [1] => 3
            [2] => 2
            [3] => 1
        )

    [8] => Array
        (
            [0] => 5
            [1] => 1
        )

    [9] => Array
        (
            [0] => 5
            [1] => 2
            [2] => 1
        )

    [10] => Array
        (
            [0] => 5
            [1] => 3
            [2] => 1
        )

    [11] => Array
        (
            [0] => 5
            [1] => 3
            [2] => 2
            [3] => 1
        )

    [12] => Array
        (
            [0] => 5
            [1] => 4
            [2] => 1
        )

    [13] => Array
        (
            [0] => 5
            [1] => 4
            [2] => 2
            [3] => 1
        )

    [14] => Array
        (
            [0] => 5
            [1] => 4
            [2] => 3
            [3] => 1
        )

    [15] => Array
        (
            [0] => 5
            [1] => 4
            [2] => 3
            [3] => 2
            [4] => 1
        )

)

Process finished with exit code 0

 */