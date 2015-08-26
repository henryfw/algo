<?php
require "ch2-linked-list.php";


function deleteNode(LinkedListNode $node) {
    if ($node == null || $node->next == null) return false;
    $nextNode = $node->next;
    $node->val = $nextNode->val;
    $node->next = $nextNode->next;
    return true;
}



$l = new LinkedList();
$l->addValue(2);
$l->addValue(3);
$l->addValue(5);
$watchNode = $l->addValue(9);
$l->addValue(20);
$l->addValue(5);
$l->addValue(5);
$l->addValue(25);


deleteNode($watchNode);
print_r($l->getAll());