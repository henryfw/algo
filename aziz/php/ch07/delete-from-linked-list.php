<?php

function deleteLinkedListNode($node) {
    $node->val = $node->next->val;
    $node->next = $node->next->next;
}