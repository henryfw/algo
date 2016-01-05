<?php

function excelColumn($n) {
    if ($n <= 0) throw new Exception("invalid");
    $offset = ord('A');

    $ans = "";

    while($n > 0) {
        $n--;
        $ch = chr($offset + $n % 26);
        $n = floor($n / 26 );
        $ans = $ch . $ans;
    }

    return $ans;
}


echo excelColumn(1) . "\n";
echo excelColumn(26) . "\n";
echo excelColumn(27) . "\n";
echo excelColumn(26*2) . "\n";
echo excelColumn(26*2 + 1) . "\n";