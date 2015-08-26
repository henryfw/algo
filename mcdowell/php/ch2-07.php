<?php
require "ch2-linked-list.php";


function isPalindrome(LinkedList $l) {
    if (!$l->first) return false;
    // slow and fast runner. slow uses a stack. when fast hit end there's half in stack.

    $stack = array();

    $p1 = $l->first;
    $p2 = $l->first;

    while ($p2) {

        $stack[] = $p1;

        if (!$p2->next) {
            break;
        }
        $p2 = $p2->next->next;
        $p1 = $p1->next;
    }

    while ($node = array_pop($stack)) {
        if ($p1->val != $node->val) {
            return 0;
        }
        $p1 = $p1->next;
    }
    return 1;

}




$l = new LinkedList();
$l->addValue('a');
$l->addValue('b');
$l->addValue('c');
$l->addValue('b');
$l->addValue('a');

var_dump( isPalindrome($l) );



$l = new LinkedList();
$l->addValue('a');
$l->addValue('b');
$l->addValue('c');
$l->addValue('c');
$l->addValue('b');
$l->addValue('a');

var_dump( isPalindrome($l) );



$l = new LinkedList();
$l->addValue('a');
$l->addValue('b');
$l->addValue('c');
$l->addValue('c');
$l->addValue('f');
$l->addValue('b');
$l->addValue('a');

var_dump( isPalindrome($l) );


