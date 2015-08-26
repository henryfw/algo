<?php
require "ch2-linked-list.php";


// with hashtable
function removeDuplicates(LinkedList $list) {

    if ($list->first == null) return;

    $parent = null;
    $node = $list->first;

    $table = array();

    while ($node != null) {
        if (isset($table[$node->val])) {
            $parent->next = $node->next;
        }
        else {
            $table[$node->val] = 1;
            $parent = $node;

        }
        $node = $node->next;
    }
}


// without hashtable, use nxn
function removeDuplicatesWithoutExtraMemory(LinkedList $list) {

    if ($list->first == null) return;

    $current = $list->first;

    while($current != null) {

        $runner = $current;

        while ($runner->next != null) {

            if ($runner->next->val == $current->val) {
                $runner->next = $runner->next->next;
            }
            else {
                $runner = $runner->next;
            }
        }

        $current = $current->next;

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
removeDuplicates($l);
print_r($l->getAll());


$l = new LinkedList();
$l->addValue(2);
$l->addValue(3);
$l->addValue(5);
$l->addValue(9);
$l->addValue(20);
$l->addValue(5);
$l->addValue(5);
$l->addValue(25);
removeDuplicatesWithoutExtraMemory($l);
print_r($l->getAll());

