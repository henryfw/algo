<?php

// clockwise
function rotateMatrix2D(&$m) {

    $width = count($m);

    for ($layer = 0; $layer < floor($width/2); $layer ++) {
        $first = $layer;
        $last = $width - 1 - $layer;

        for ($i = $first; $i < $last; $i ++) {
            $offset = $i - $first;

            // top = $m[$first][$i]
            // right = $m[$i][$last]
            // bottom = $m[$last][$last - $offset]
            // left = $m[$last - $offset][$first]


            $top = $m[$first][$i];

            // top <- left
            $m[$first][$i] = $m[$last - $offset][$first];

            // left <- bottom
            $m[$last - $offset][$first] = $m[$last][$last - $offset];

            // bottom <- right
            $m[$last][$last - $offset] = $m[$i][$last];

            // right <- top
            $m[$i][$last] = $top;

        }
    }
}




// reads as $ans[y][x]
$ans = [
    [1,2,3,4,5], # 1st row
    [1,2,3,4,5], # 2nd row
    [1,2,3,4,5],
    [1,2,3,4,5],
    [1,2,3,4,5],
];

rotateMatrix2D($ans);

array_map(function($v){
    echo implode(" ", $v) . "\n";
}, $ans);