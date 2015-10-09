<?php
require "../../../mcdowell/php/ch2-linked-list.php";


function reverseLinkedList(LinkedListNode $head) {
    $prev = null;
    while($head) {
        // save next
        $temp = $head->next;
        // head next = prev
        $head->next = $prev;
        // save head to prev
        $prev = $head;
        // move head to next node saved in temp
        $head = $temp;
    }
    return $prev;
}



$list = new LinkedList();
$list->addValue(2);
$list->addValue(3);
$list->addValue(3);
$list->addValue(3);
$list->addValue(4);
$list->addValue(5);
$list->addValue(6);



$head = reverseLinkedList($list->first);

while($head) {
    echo "{$head->val} ";
    $head = $head->next;
}