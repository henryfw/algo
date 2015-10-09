<?php

function oddEvenMerge($head) {
    if (!$head) return $head;

    $evenListHead = $head;
    $evenListIter = $head;

    $predecessorEvenListIter = null;

    $oddListHead = $head->next;
    $oddListIter = $oddListHead;


    while($evenListIter && $oddListIter) {
        $evenListIter->next = $oddListIter->next;
        $predecessorEvenListIter = $evenListIter;
        $evenListIter = $evenListIter->next;

        if ($evenListIter) {
            $oddListIter = $evenListIter->next;
            $oddListIter = $oddListIter->next;
        }
    }


    if ($evenListIter) {
        $evenListIter->next = $oddListHead;
    }
    else {
        $predecessorEvenListIter->next = $oddListHead;
    }

    return $evenListHead;
}