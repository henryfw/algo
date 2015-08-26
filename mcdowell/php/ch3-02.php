<?php
require "ch3-stacks-queues.php";

class StackWithMin {

    public $data = array();

    public function push($val) {
        $min = null;
        $l = count($this->data);
        if ($l) {
            $min = $this->data[$l - 1]->min;
        }
        if ($min === null || $val < $min) {
            $min = $val;
        }
        $node = new StackWithMinNode($val, $min);
        $this->data[] = $node;
    }

    // returns StackWithMinNode
    public function pop() {
        $l = count($this->data);
        if (!$l) return null;
        $node = array_pop($this->data);
        return $node;
    }
}

class StackWithMinNode {
    public $val;
    public $min;

    public function __construct($val, $min = 0){
        $this->val = $val;
        $this->min = $min;
    }

    public function __toString() {
        return "val: {$this->val}, min: {$this->min}\n";
    }
}


// more space efficient
class StackWithMin2 {
    public $data = array();
    public $mins = array();
    public function getCurrentMin() {
        $l = count($this->mins);
        if ($l > 0) {
            return $this->mins[$l - 1];
        }
        else {
            return null;
        }
    }
    public function push($val) {
        $min = $this->getCurrentMin();
        if ($min === null) {
            $min = $val;
        }
        if ($val <= $min) {
            $this->mins[] = $val;
        }
        $this->data[] = $val;
    }
    public function pop() {
        $l = count($this->data);
        if ($l > 0) {
            $val = array_pop($this->data);
            $min = $this->getCurrentMin();
            if ($val == $min) {
                array_pop($this->mins);
            }
            return "$val, $min \n";
        }
        return null;
    }
}


$stack = new StackWithMin2();
$stack->push(31);
$stack->push(3);
$stack->push(3);
$stack->push(5);
$stack->push(6);
$stack->push(1);
$stack->push(1);
$stack->push(1);
$stack->push(10);
$stack->push(12);
$stack->push(15);

echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();
echo $stack->pop();