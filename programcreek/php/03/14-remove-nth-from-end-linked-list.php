<?php

function removeNthFromEnd($head, $n) {
    $fast = $head;
    $slow = $head;

    for ($i = 0; $i < $n; $i ++ ) {
        $fast = $fast->next;
    }

    if ($fast == null) {
        $head = $head->next;
        return $head;
    }

    while ($fast->next) {
        $fast = $fast->next;
        $slow = $slow->next;
    }
    $slow->next = $slow->next->next;

    return $head;
}