<?php

function linkedListCycle($node) {
    $fast = $node;
    $slow = $node;

    while ($fast && $fast->next) {
        $slow = $fast->next;
        $fast = $fast->next->next;

        if ($slow == $fast) return true;
    }

    return false;
}