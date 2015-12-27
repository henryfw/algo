<?


// http://www.geeksforgeeks.org/count-number-binary-strings-without-consecutive-1s/


function countString($n) {
    $a = [1];
    $b = [1];

    for ($i = 1; $i < $n; $i ++) {
        $a[$i] = $a[$i - 1] + $b[$i - 1];
        $b[$i] = $a[$i - 1];
    }

    return $a[$n - 1] + $b[$n - 1];
}