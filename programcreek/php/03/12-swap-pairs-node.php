<?php

function swapPairs($head) {
    $fakeHead = new Node(0);

    $fakeHead->next = $head;

    $p = $fakeHead;

    while ($p->next && $p->next->next) {
        // t1 tracks first
        $t1 = $p;
        $p = $p->next;
        $t1->next = $p->next;


        // t2 tracks second
        $t2 = $p->next->next;
        $p->next->next = $p;
        $p->next = $t2;
    }

    return $fakeHead->next;
}