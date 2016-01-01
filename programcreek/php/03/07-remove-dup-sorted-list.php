<?php

function removeDuplicates($head) {


    $p = $head;

    while ($p && $p->next) {
        $next = $p->next;
        while ($next->val == $p->val) {
            // fast forward
            $next = $next->next;
        }
        $p->next = $next;
        $p = $next;
    }

    return $head;
}