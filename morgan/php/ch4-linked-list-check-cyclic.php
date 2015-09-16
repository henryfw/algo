<?php

function isCyclic($head) {
    $slow = $head;
    $fast = $head->next;

    while(true) {
        if (!$fast || !$fast->next) {
            return false;
        }
        else if ($fast === $slow || $fast->next === $slow) {
            return true;
        }
        else {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
    }
}