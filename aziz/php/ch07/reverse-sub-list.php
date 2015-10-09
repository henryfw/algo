<?php

require "../../../mcdowell/php/ch2-linked-list.php";


function reverseSubList($head, $start, $finish) {
    if ($start == $finish) return $head;

    $dummyHead = new LinkedListNode(null);
    $dummyHead->next = $head;

    $subListHead = $dummyHead;

    $k = 1;

    while ($k ++ < $start) {
        $subListHead = $subListHead->next;
    }

    $subListIter = $subListHead->next;

    while ($start ++ < $finish) {
        $temp = $subListIter->next;
        $subListIter->next = $temp->next;
        $temp->next = $subListHead->next;
        $subListHead->next = $temp;
        echo "iter: {$subListIter->val}, head: {$subListHead->val}, temp: {$temp->val}\n";
    }
    return $dummyHead->next;
}



$list = new LinkedList();
$list->addValue(1);
$list->addValue(2);
$list->addValue(3);
$list->addValue(4);
$list->addValue(5);
$list->addValue(6);
$list->addValue(7);
$list->addValue(8);



$head = reverseSubList($list->first, 1,3);

while($head) {
    echo "{$head->val} ";
    $head = $head->next;
}