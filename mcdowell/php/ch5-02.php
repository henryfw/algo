<?php


function decToBinString($n) {
    if ($n >= 1 || $n <= 0) {
        return "ERROR";
    }

    $text = ".";
    while ($n > 0) {
        if (strlen($text) > 32) {
            //return "ERROR";
        }
        $r = $n * 2;
        if ($r >= 1) {
            $text .= '1';
            $n = $r - 1;
        }
        else {
            $text .= '0';
            $n = $r;
        }
    }
    return $text;
}


echo decToBinString(.75);

