<?php


function linkedListPivot($l, $pivot) {
    $lessHead = new LinkedListNode(null);
    $equalHead = new LinkedListNode(null);
    $greaterHead = new LinkedListNode(null);

    $lessIter = $lessHead;
    $equalIter = $equalHead;
    $greaterIter = $greaterHead;


    $iter = $l;

    while ($iter) {
        if ($iter->val < $pivot) {
            $lessIter->next = $iter;
            $lessIter = $iter;
        }
        else if ($iter->val == $pivot) {
            $equalIter->next = $iter;
            $equalIter = $iter;
        }
        else {
            $greaterIter->next = $iter;
            $greaterIter = $iter;
        }
        $iter = $iter->next;
    }
    $lessIter->next = $equalIter->next = $greaterIter->next = null;

    if ($greaterHead->next) {
        $equalIter->next = $greaterHead->next;
    }
    if ($equalIter->next) {
        $lessIter->next = $equalIter->next;
    }
    return $lessHead->next;
}