<?php

function anagrams($inputs) {


    $map = [];

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $arr = str_split($inputs[$i]);

        sort($arr);

        $t = implode('', $arr);

        if (!isset($map[$t])) {
            $map[$t] = [$i];
        }
        else {
            $map[$t][] = $i;
        }
    }


    return $map;
}