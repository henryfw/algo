<?php

class MyQueue {
    public $inData = array();

    public $tmpData = array();


    public function enqueue($v) {
        $this->inData[] = $v;
    }

    public function dequeue() {
        // move all inData to tmpData
        $tmp = null;
        $this->tmpData = [];
        while($v = array_pop($this->inData)) {
            $this->tmpData[] = $v;
            $tmp = $v;
        }

        array_pop($this->tmpData);

        // move all tmpData back to inData
        $this->inData = [];
        while($v = array_pop($this->tmpData)) {
            $this->inData[] = $v;
        }

        return $tmp;
    }
}


class MyQueueConstantTime {
    public $newStack = [];
    public $oldStack = [];

    public function enqueue($v) {
        $this->newStack[] = $v;
    }

    public function dequeue() {
        $this->shiftStack();
        return array_pop($this->oldStack);
    }

    public function shiftStack() {
        if (empty($this->oldStack)) {
            while($v = array_pop($this->newStack)) {
                $this->oldStack[] = $v;
            }
        }
    }
}


$q = new MyQueueConstantTime();

$q->enqueue(1);
$q->enqueue(2);
$q->enqueue(3);
$q->enqueue(4);
$q->enqueue(5);


var_dump($q->dequeue());
var_dump($q->dequeue());
var_dump($q->dequeue());
var_dump($q->dequeue());