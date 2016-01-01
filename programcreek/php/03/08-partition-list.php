<?php

function partition($head, $x) {
    $fakeHead1 = new Node(0);
    $fakeHead2 = new Node(0);

    $fakeHead1->next = $head;


    $p = $head;
    $prev = $fakeHead1;
    $p2 = $fakeHead2;

    while ($p) {
        if ($p->val < $x) {
            $p = $p->next;
            $prev = $prev->next;
        }
        else {
            $p2->next = $p;
            $prev->next = $p->next;

            $p = $prev->next;
            $p2 = $p2->next;
        }
    }

    $p2->next = null;

    $prev->next = $fakeHead2->next;


    return $fakeHead1->next;

}