<?php


function calculateLargestRectangle($inputs) {
    $s = [];
    $maxArea = 0;

    for ($i = 0; $i <= count($inputs) ; $i ++ ) {
        while (!empty($s) && (
                $i == count($inputs) || $inputs[$i] < $inputs[$s[0]]
            )) {
            $height = $inputs[$s[0]];

            array_shift($s);

            $maxArea = max($maxArea,
                $height * (empty($s) ? $i : $i - $s[0] - 1));
        }

        $s[] = $i;
    }

    return $maxArea;
}



