<?php

/*
PROBLEM Start with a standard doubly linked list. Now imagine that in addition to the next and previous pointers, each element has a child pointer, which may or may not point to a separate doubly linked list. These child lists may have one or more children of their own, and so on, to produce a multilevel data structure, as shown in Figure 4-3.
*/

function flattenList($head, $tail) {
    $current = $head;
    while ($current) {
        if ($current->child) {
            $tail = append($current->child, $tail);
        }
        $current = $current->next;
    }
}

function append($child, $tail) {
    $tail->next = $child;
    $child->prev = $tail;

    for($current = $child; $current->next; $current = $current->next) ;

    $tail = $current;
    return $tail;
}


class Node {
    public $child;
    public $next;
    public $prev;
    public $id;
    public function __construct($id) {
        $this->id = $id;
    }
}

$head = new Node(0);
$head->next = new Node(1);
$head->next->prev = $head;
$head->next->next = new Node(2);
$head->next->next->prev = $head->next;
$head->next->next->next = new Node(3);
$head->next->next->next->prev = $head->next->next;
$tail = $head->next->next->next->next = new Node(4);
$head->next->next->next->next->prev = $head->next->next->next;

$head->next->child = new Node(11);
$head->next->child->next = new Node(12);
$head->next->child->next->prev = $head->next->child;


flattenList($head, $tail);

$current = $head;
while($current) {
    echo "{$current->id} ";
    $current = $current->next;
}
