<?php
require "ch2-linked-list.php";


function findCircleStart(LinkedListNode $node) {

    if (!$node || !$node->next) return null;
    if ($node === $node->next) return $node;

    $p1 = $node;
    $p2 = $node;

    do {
        $p1 = $p1->next;
        if ($p2->next == null) break;
        $p2 = $p2->next->next;
    }
    while ( $p1 && $p2 && $p1 !== $p2);

    if ($p1 === $p2) {

        // move slow to head
        $p1 = $node;
        while ($p1 !== $p2) {
            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        return $p2;
    }

    else {
        return null; // not circle
    }


}




$l = new LinkedList();
$l->addValue(3);
$l->addValue(12);
$l->addValue(23);
$l->addValue(23);
$l->addValue(23);
$l->addValue(23);
$l->addValue(23);
$l->addValue(33);
$first = $l->addValue(2);
$l->addValue(3);
$l->addValue(5);
$l->addValue(5);
$l->addValue(5);
$l->addValue(25);
$l->addValue(15);
$l->addValue(15);
$l->addValue(15);
$l->addValue(15);
$l->addValue(15);
$l->addValue(35);
$l->addValue(55);
$l->addValue(5);
$l->addValue(9)->next = $first;


echo findCircleStart($l->first);

