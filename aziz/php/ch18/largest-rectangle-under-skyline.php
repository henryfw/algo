<?php


function calculateLargestRectangle($inputs) {
    $s = [];
    $maxArea = 0;



    for ($i = 0; $i <= count($inputs) ; $i ++ ) {
        echo "before start s for $i: " . implode(",", $s) . "\n";
        while (!empty($s) && (
                $i == count($inputs) || $inputs[$i] < $inputs[$s[0]]
            )) {
            $height = $inputs[$s[0]];

            array_shift($s);

            $width = (empty($s) ? $i : $i - $s[0] - 1);
            $new =  $height * $width;

            echo "new: $new, old: $maxArea, i: $i, height: $height, width: $width \n";

            $maxArea = max($maxArea, $new);
        }

        array_unshift($s, $i);
    }

    return $maxArea;
}


echo calculateLargestRectangle([2, 3, 4, 1, 2]);