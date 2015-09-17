<?php

function findChar($str) {
    $map = [];
    for($i = 0; $i < strlen($str); $i ++) {
        $map[$str{$i}] += 1;
    }

    for($i = 0; $i < strlen($str); $i ++) {
        if ($map[$str{$i}] === 1) return $str{$i};
    }
    return null;
}


var_dump(findChar("abcdefabc"));