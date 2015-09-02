<?php

function paintFill($screen, $x, $y, $newColor) {
    $width = count($screen[0]);
    $height = count($screen);

    if ($x >= $width || $x < 0 || $y < 0 || $y >= $height) return;

    if ($screen[$y][$x] != $newColor) {
        $screen[$y][$x] = $newColor;
        paintFill($width, $height, $x + 1, $y, $newColor);
        paintFill($width, $height, $x - 1, $y, $newColor);
        paintFill($width, $height, $x, $y + 1, $newColor);
        paintFill($width, $height, $x, $y - 1, $newColor);
    }

}