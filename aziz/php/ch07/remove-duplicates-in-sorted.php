<?php

function removeDuplicatesInSortedList($head) {

    $iter = $head;
    while ($iter) {
        $nextDistinct = $iter->next;
        while ($nextDistinct && $nextDistinct->val == $iter->val) {
            $nextDistinct = $nextDistinct->next;
        }
        $iter->next = $nextDistinct;
        $iter = $nextDistinct;
    }

    return $head;
}



