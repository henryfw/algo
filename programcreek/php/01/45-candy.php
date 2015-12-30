<?php

function candy($inputs) {
    $ans = [1];

    for ($i = 1; $i < count($inputs); $i ++ ) {
        if ($inputs[$i] > $inputs[$i - 1]) {
            $ans[$i] = $ans[$i - 1] + 1;
        }
        else {
            $ans[$i] = 1;
        }
    }

    $result = end($ans);

    for ($i = count($ans) - 2; $i >= 0; $i -- ) {
        $cur = 1;
        if ($inputs[$i] > $inputs[$i + 1]) {
            $cur = $ans[$i + 1] + 1;
        }

        $result += max($cur, $ans[$i]);
        $ans[$i] = $cur;
    }

    return $result;
}