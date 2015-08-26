<?php
require "ch2-linked-list.php";

function findKthFromEndNode(LinkedList $list, $k) {


    if (!$list->first || $k == 0) return null;

    $p1 = $list->first;
    $p2 = $list->first;

    // move p2 forward k-1
    for ($i = 0 ; $i < $k - 1; $i ++) {
        if (!$p2) return null;
        $p2 = $p2->next;
    }
    if (!$p2) return null;

    // move both p1 and p2 forward until p2 hits end, then return p1
    while ($p2->next != null) {
        $p2 = $p2->next;
        $p1 = $p1->next;
    }
    return $p1;
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

$node = findKthFromEndNode($l, 4);
var_dump( $node ? $node->val : null );


$node = findKthFromEndNode($l, 99);
var_dump( $node ? $node->val : null );