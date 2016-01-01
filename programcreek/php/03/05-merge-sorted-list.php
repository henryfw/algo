<?php


function mergeTwoList($l1, $l2) {

    $p1 = $l1;
    $p2 = $l2;


    $fakeHead = new Node(0);

    $p = $fakeHead;

    while ($p1 && $p2) {
        if ($p1->val <= $p2->val) {
            $p->next = $p1;
            $p1 = $p1->next;
        }
        else {
            $p->next = $p2;
            $p2 = $p2->next;
        }
        $p = $p->next;
    }

    if ($p1) $p->next = $p1;
    if ($p2) $p->next = $p2;

    return $fakeHead->next;
}