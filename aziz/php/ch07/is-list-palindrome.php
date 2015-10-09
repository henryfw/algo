<?php

function isPalinDromeLinkedList($head) {

    if (!$head) return null;


    // 2nd half
    $slow = $head;
    $fast = $head;

    while ($fast && $fast->next) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }

    // Compare the first half and the reversed second half lists.

    $firstHalfIter = $head;
    $secondHalfIter = reverseLinkedList($slow->next);

    while ($secondHalfIter && $firstHalfIter) {
        if ($secondHalfIter->val != $firstHalfIter->val) return false;

        $secondHalfIter = $secondHalfIter->next;
        $firstHalfIter = $firstHalfIter->next;
    }

    return true;
}