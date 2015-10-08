<?php

function excelColumnDecode($n) {
    $n = strtoupper($n);
    $ans = 0;

    foreach(str_split($n) AS $char) {
        $ans = $ans * 26 + ord($char) - ord('A') + 1;
    }

    return $ans;
}

echo excelColumnDecode('AA');