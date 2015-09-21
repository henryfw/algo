<?php
// http://www.careercup.com/question?id=6313112158339072

class Node {
    public $val = null;
    public $prev = null;
    public $next = null;
    public function __construct($val){
        $this->val = $val;
    }
    public function __toString() {
        $nextVal = $this->next ? $this->next->val : "";
        $prevVal = $this->prev ? $this->prev->val : "";
        return "Value {$this->val}, Next {$nextVal}, Prev {$prevVal}\n";
    }
}


function swapPairs($first, $second) {
    if (!$first || !$second) return;

    $secondNext = $second->next;
    $firstPrev = $first->prev;

    $second->next = $first;
    $second->prev = $firstPrev;

    $first->next = $secondNext;
    $first->prev = $second;


    if ($secondNext) {
        $secondNext->prev = $first;
        swapPairs($secondNext, $secondNext->next);
    }
    if ($firstPrev) {
        $firstPrev->next = $second;
    }
}


$a = new Node('a');
$b = new Node('b');
$c = new Node('c');
$d = new Node('d');
$e = new Node('e');
$f = new Node('f');

$a->next = $b;
$b->next = $c;
$c->next = $d;
$d->next = $e;
$e->next = $f;

$b->prev = $a;
$c->prev = $b;
$d->prev = $c;
$e->prev = $d;
$f->prev = $e;


swapPairs($a, $b);

echo $a, $b, $c, $d, $e, $f;

$node = $b;
while ($node) {
    print "{$node->val} ";
    $node = $node->next;
}