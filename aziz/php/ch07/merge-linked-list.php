<?php

require "../../../mcdowell/php/ch2-linked-list.php";

function mergeLinkedList(LinkedListNode $a, LinkedListNode $b) {
    $newHead = new LinkedListNode(0);
    $newTail = $newHead;

    while ($a && $b) {
        appendNode($a->val <= $b->val ? $a : $b, $newTail);
    }

    $newTail->next = $a ? $a : $b;

    return $newHead->next;

}

function appendNode($node, &$tail) {
    $tail->next = $node;
    $tail = $node;
    $node = $node->next;
}


mergeLinkedList($a->first, $b->first);



$list = new LinkedList();
$list->addValue(2);
$list->addValue(3);
$list->addValue(3);
$list->addValue(3);
$list->addValue(4);
$list->addValue(5);
$list->addValue(6);


$list2 = new LinkedList();
$list2->addValue(1);
$list2->addValue(3);
$list2->addValue(3);
$list2->addValue(8);
$list2->addValue(9);
$list2->addValue(11);
$list2->addValue(16);


