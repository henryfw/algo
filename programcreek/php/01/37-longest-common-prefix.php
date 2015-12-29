<?php

function longestCommonPrefix($inputs) {
    $minLen = PHP_INT_MAX;

    foreach($inputs AS $v) {
        if ($minLen < strlen($v)) {
            $minLen = strlen($v);
        }
    }
    if ($minLen == 0) return "";

    for ($j = 0; $j < $minLen; $j ++) {
        $prev = '';
        for ($i = 0; $i < count($inputs) ; $i ++ ) {
            if ($i == 0) {
                $prev = $inputs[$i]{$j};
                continue;
            }

            if ($inputs[$i]{$j} != $prev) {
                return substr($inputs[$i], 0, $j);
            }
        }
    }

    return substr($inputs[0], 0, $minLen);
}

