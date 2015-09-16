<?php

// returns pointer to new tail
function unflattenList($start) {
    exploreAndSeparate($start);

    for($current = $start; $current->next; $current = $current->next);

    $tail = $current;

    return $tail;
}


function exploreAndSeparate($childListStart) {

    $current = $childListStart;

    while($current) {
        if ($current->child) {

            // remove next pointers to child
            $current->child->prev->next = null;

            // remove child's prev pointer
            $current->child->prev = null;

            exploreAndSeparate($current->child);

        }
        $current = $current->next;
    }
}