<?php

function removeElement($head, $target) {
    $fakeHead = new Node(0);
    $fakeHead->next = $head;
    $p = $head;
    
    while ($p->next) {
        if ($p->next->val == $target) {
            $p->next = $p->next->next;
        }
        else {
            $p = $p->next;
        }
    }
    
    return $fakeHead->next;
}