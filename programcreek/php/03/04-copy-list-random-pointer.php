<?php

function copyRandomList($head) {

    $map = new SplObjectStorage(); // old => new

    $newHead = new Node($head->val);


    $p = $head;
    $q = $newHead;

    $map[$head] = $newHead;

    $p = $p->next;
    while ($p) {
        $temp = new Node($p->val);

        $map[$p] = $temp;
        $q->next = $temp;
        $q = $temp;
        $p = $p->next;
    }

    $p = $head;
    $q = $newHead;

    while ($p) {
        if ($p->random) {
            $q->random = $map[$p->random];
        }
        $p = $p->next;
        $q = $q->next;
    }


    return $newHead;
}