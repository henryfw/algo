<?php

function checkCycle($head) {
    $fast = $head;
    $slow = $head;


    while ($fast && $fast->next && $fast->next->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow == $fast) {
            $cylenLen = 0;

            do {
                $cylenLen ++;
                $fast = $fast->next;
            } while ($slow != $fast);

            $cycleIter = $head;

            while($cylenLen --) {
                $cycleIter = $cycleIter->next;
            }

            $iter = $head;
            while($iter != $cycleIter) {
                $iter = $iter->next;
                $cycleIter = $cycleIter->next;
            }

            return $iter;
        }
    }

    return null;
}