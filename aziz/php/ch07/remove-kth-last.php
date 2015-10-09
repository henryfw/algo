<?php

function removeKthLast($head, $k) {

    $dummyHead = new LinkedListNode(null);
    $dummyHead->next = $head;

    $first = $dummyHead->next;

    while($k -- > 0) {
        $first = $first->next;
    }

    $second = $dummyHead->next;
    while($first) {
        $first = $first->next;
        $second = $second->next;
    }

    $second->next = $second->next->next;
    return $dummyHead->next;

}