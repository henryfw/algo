<?php


function linkedListAddition($a, $b) {
    $placeIter = new LinkedListNode(null);

    $carry  = 0;

    while ($a && $b) {
        $sum = $carry;
        if ($a) {
            $sum += $a->val;
            $a = $a->next;
        }
        if ($b) {
            $sum += $b->val;
            $b = $b->next;
        }

        $placeIter->next = new LinkedListNode($sum % 10);
        $carry = floor($sum/10);
        $placeIter = $placeIter->next;
    }

    if ($carry) {
        $placeIter->next = new LinkedListNode($carry);
    }
    return $placeIter->next;
}