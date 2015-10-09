<?php

function cyclicRight($head, $k) {
    if (!$head) return $head;

    $tail = $head;
    $n = 1;

    while ($tail->next) {
        $n ++;
        $tail = $tail->next;
    }

    $k %= $n;

    if ($k == 0) return $head;

    $tail->next = $head;

    $stepsToNewHead = $n - $k % $n;

    $newTail = $tail;

    while ($stepsToNewHead --) {
        $newTail = $newTail->next;
    }

    $newHead = $newTail->next;
    $newTail->next = null;

    return $newHead;

}

