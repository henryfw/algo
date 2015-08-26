<?php
require "ch2-linked-list.php";


function partitionList(LinkedList $l, $x) {

    if (!$l->first) return;
    $node = $l->first;


    while ($node->next != null) {

        if ($node->next->val < $x) {
            $oldNextNext = $node->next->next;
            $node->next->next = $l->first;
            $l->first = $node->next;
            $node->next = $oldNextNext;
        }
        else {
            $node = $node->next;
        }

    }

}



$l = new LinkedList();
$l->addValue(2);
$l->addValue(3);
$l->addValue(5);
$l->addValue(9);
$l->addValue(20);
$l->addValue(5);
$l->addValue(5);
$l->addValue(25);

print_r($l->getAll());
partitionList($l, 8);
print_r($l->getAll());