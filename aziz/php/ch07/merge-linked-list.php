<?php

require "../../../mcdowell/php/ch2-linked-list.php";

function mergeLinkedList(LinkedListNode $a, LinkedListNode $b) {
    $dummyHead = new LinkedListNode(null);

    $current = $dummyHead;

    while ($a && $b) {
        if ($a->val <= $b->val) {
            $current->next = $a;
            $a = $a->next;
        }
        else {
            $current->next = $b;
            $b = $b->next;
        }
        $current = $current->next;
    }

    $current->next = $a ? $a : $b;

    return $dummyHead->next;
}




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


$head = mergeLinkedList($list->first, $list2->first);

while($head) {
    echo "{$head->val} ";
    $head = $head->next;
}
