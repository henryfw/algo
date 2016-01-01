<?php

function reverseLinkedList($head) {

    $p1 = $head;
    $p2 = $head->next;

    $head->next = null;

    while ($p1 && $p2) {
        $t = $p2->next;
        $p2->next = $p1;
        $p1 = $p2;

        if ($t) {
            $p2 = $t;
        }
        else {
            break;
        }
    }

    return $p2;
}