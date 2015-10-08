<?php



function lookAndSay($n) {
    $s = "1";
    for ($i = 1; $i < $n; $i ++) {
        $s = nextNumber($s);
    }
    return $s;
}


function nextNumber($s) {
    $ans = '';

    for ($i = 0; $i < strlen($s); $i ++) {
        $count = 1;
        while($i + 1 < strlen($s) && $s{$i} == $s{$i + 1}) {
            $i ++;
            $count ++;
        }
        $ans .= $count . $s{$i};
    }

    return $ans;
}

echo lookAndSay(4);