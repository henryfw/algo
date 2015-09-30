<?php

// http://www.careercup.com/question?id=5890898499993600


function findWordInMatrix($inputs, $chars) {
    $width = count($inputs[0]);
    $height = count($inputs);
    $chars = str_split($chars);

    $letterPositions = [];

    for ($i = 0; $i < $height; $i ++) {
        for ($j = 0; $j < $width; $j ++) {
            $letter = $inputs[$i][$j];
            if (!isset($letterPositions[$letter])) {
                $letterPositions[$letter] = [];
            }
            $letterPositions[$letter][] = [$i, $j];
        }
    }

    $openList = []; // [ [first i, j], [second i, j] ]

    for ($index = 0; $index < count($chars); $index ++) {
        $char = $chars[$index];
        $potential = $letterPositions[$char];

        foreach($potential AS $item) {
            if ($index == 0) {
                $openList[] = [$item];
            }
            else {
                // append item in openList only if adjacent
                for ($openListIndex = 0; $openListIndex < count($openList); $openListIndex ++) {
                    if (!in_array($item, $openList[$openListIndex])) {
                        if (isNextTo($openList[$openListIndex][count($openList[$openListIndex])-1], $item)) {
                            $openList[$openListIndex][] = $item;
                            if ($index == count($chars) - 1) {
                                return $openList[$openListIndex];
                            }
                        }
                    }
                }
            }
        }
    }

    return null;
}

function isNextTo($a, $b) {
    return abs($a[0] - $b[0]) <= 1 && abs($a[1] - $b[1]) <= 1;
}



$text =
"a b c d e f
z n a b c f
f g f a b c";
$inputs = [];
foreach(explode("\n", $text) AS $line) {
    $inputs[] = explode(" ", trim($line));
}


print_r(findWordInMatrix($inputs, 'fnz'));


