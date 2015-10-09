<?php

function testOverlappingListWithNoCycle($a, $b) {
    $aLength = listLength($a);
    $bLength = listLength($b);

    if ($a > $b) {
        $a = advanceList($a, $aLength - $bLength);
    }
    else {
        $b = advanceList($b, $bLength - $aLength);
    }

    while ($a && $b && $a != $b) {
        $a = $a->next;
        $b = $b->next;
    }
    return $a;
}

function advanceList($a, $n) {
    while($n > 0 && $a) {
        $a = $a->next;
        $n --;
    }
    return $a;
}

function listLength($a) {
    $n = 0;
    while ($a) {
        $n ++;
        $a = $a->next;
    }
    return $n;
}