<?php
require "ch2-linked-list.php";


function addListsOnesFirst(LinkedList $l1, LinkedList $l2) {

    $ans = new LinkedList();

    $node1 = $l1->first;
    $node2 = $l2->first;

    if (!$node1 && !$node2) return 0;

    $carry = 0;
    while($node1 != null || $node2 != null) {

        $sum = $carry;
        if ($node1) {
            $sum += $node1->val;
            $node1 = $node1->next;
        }
        if ($node2) {
            $sum += $node2->val;
            $node2 = $node2->next;
        }

        if ($sum > 9) {
            $carry = 1;
            $sum = $sum % 10;
        }
        else {
            $carry = 0;
        }

        $ans->addValue($sum);
    }

    if ($carry) {
        $ans->addValue(1);
    }

    return $ans;
}



function addListsOnesLast(LinkedList $l1, LinkedList $l2)
{
    $l1_reverse = clone $l1;
    $l2_reverse = clone $l2;

    reverseList($l1_reverse);
    reverseList($l2_reverse);

    $ans = addListsOnesFirst($l1_reverse, $l2_reverse);

    reverseList($ans);
    return $ans;
}

function reverseList(LinkedList $l) {
    if ($l->first == null) return;

    $node = $l->first;

    while ($node->next) {
        $nextNext = $node->next->next;
        $node->next->next = $l->first;
        $l->first = $node->next;
        $node->next = $nextNext;
    }
}

$l = new LinkedList();
$l->addValue(2);
$l->addValue(3);
$l->addValue(5);
$l->addValue(9);


$l2 = new LinkedList();
$l2->addValue(2);
$l2->addValue(8);
$l2->addValue(5);
$l2->addValue(9);
$l2->addValue(9);
$l2->addValue(1);

$ans = addListsOnesFirst($l, $l2);

print_r($ans->getAll());
//
//reverseList($ans);
//
//print_r($ans->getAll());

$ans = addListsOnesLast($l, $l2);

print_r($ans->getAll());

