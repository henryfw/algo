<?php

function findSubstring($text, $k = 2) {

    if (strlen($text) < $k) {
        return $text;
    }

    $bestAns = "";
    $lastTwoUniqueChars = array();

    $ans = "";
    for ($i = 0; $i < strlen($text); $i ++ ) {
        $letter = $text{$i};

        if (count($lastTwoUniqueChars) < $k) {
            if (!in_array($letter, $lastTwoUniqueChars)) {
                $lastTwoUniqueChars[] = $letter;
            }
            continue;
        }

        if (in_array($letter, $lastTwoUniqueChars)) {
            $ans .= $letter;
        }
        else {
            // new letter from last k uniques
            $lastTwoUniqueChars = array();
            $ans = "";
            for ($j = 0; $j < $k; $j ++) {
                $lastTwoUniqueChars[$text{$i - $j}];
                $ans = $text{$i - $j} . $ans;
            }


        }


        if (strlen($ans) > strlen($bestAns)) {
            $bestAns = $ans;
        }
    }


    if ($bestAns == "") {
        return $text;

    }
    else {
        return $bestAns;
    }


}


echo findSubstring("a") . "\n\n";
echo findSubstring("ab") . "\n\n";
echo findSubstring("abcde") . "\n\n";
echo findSubstring("abcbbbbcccbdddadacb") ."\n\n";