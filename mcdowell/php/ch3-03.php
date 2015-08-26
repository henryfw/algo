<?php

class SetOfStacks {

    public $capacity = 5;
    public $set = array();
    public $count = -1;

    public function push($val) {
        $this->count  ++;
        $setIndex = floor($this->count / $this->capacity) ;

        if (!isset($this->set[$setIndex])) {
            $this->set[$setIndex] = array();
        }
        array_push($this->set[$setIndex], $val);
    }

    public function pop() {
        $setIndex = floor($this->count / $this->capacity) ;
        $this->count  --;

        $val = array_pop($this->set[$setIndex]);
        if (empty($this->set[$setIndex]) && isset($this->set[$setIndex + 1])) {
            unset($this->set[$setIndex + 1]);
        }
        return $val;
    }


}

function pr($set) {
    array_map(function($stack) {
        echo '- '. implode(" ", $stack) . "\n";
    }, $set);
    echo "\n";
}

$stack = new SetOfStacks();

$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
$stack->push(11);
$stack->push(12);
$stack->push(13);
$stack->push(14);
$stack->push(15);
$stack->push(111);
$stack->push(112);
$stack->push(113);
$stack->push(114);
$stack->push(115);

pr($stack->set);

$stack->pop();
$stack->pop();
$stack->pop();


pr($stack->set);

$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();

pr($stack->set);

