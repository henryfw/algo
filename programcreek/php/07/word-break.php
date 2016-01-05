<?php


function wordBreak($s, $dict) {
    $t = array_fill(0, strlen($s) + 1, false);
    $t[0] = true;


    for ($i = 0; $i < strlen($s); $i ++ ) {
        //should continue from match position
        if (!$t[$i]) continue;

        foreach($dict AS $word) {
            $len = strlen($word);
            $end = $i + $len;

            if ($end > strlen($s)) continue;

            if ($t[$end]) continue;

            if (substr($s, $i, $end - $i) == $word) {
                $t[$end] = true;
            }
        }
    }

    return $t[strlen($s)];
}


var_dump(wordBreak( "programcreek", ["abc","program","creek"]));
var_dump(wordBreak( "asdf", ["abc","program","creek"]));