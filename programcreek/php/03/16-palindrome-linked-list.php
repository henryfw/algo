<?php

function isPalindrome($head) {
    $fast = $head;
    $slow = $head;

    while ($fast->next && $fast->next->next) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }

    $secondHead = $slow->next;
    $slow->next = null;


    $p1 = $secondHead;
    $p2 = $p1->next;

    //reverse second part of the list
    while($p1 && $p2) {
        $t = $p2->next;
        $p2->next = $p1;
        $p1 = $p2;
        $p2 = $t;
    }

    $secondHead->next = null;

    $p = ($p2 ? $p1 : $p2) ;
    $q = $head;

    while ($p) {
        if ($p->val != $q->val) return false;

        $p = $p->next;
        $q = $q->next;
    }

    return true;
}