<?php

function snakeLetters($str) {
    $ans = "";

    for ($i = 1; $i < strlen($str); $i += 4) {
        $ans .= $str{$i};
    }

    for ($i = 0; $i < strlen($str); $i += 2) {
        $ans .= $str{$i};
    }

    for ($i = 3; $i < strlen($str); $i += 4) {
        $ans .= $str{$i};
    }



    return $ans;
}

echo snakeLetters("hello_world");