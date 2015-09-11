<?php

// SplMaxHeap
// SplMinHeap

class FindMedian {
    public $minHeap = null;
    public $maxHeap = null;

    public function log($str) {
        echo $str . "\n";
    }

    public function printHeaps() {
        echo "\nmin heap: \n";
        $heap = clone $this->minHeap;
        while (!$heap->isEmpty()) {
            echo "{$heap->extract()} ";
        }
        echo "\nmax heap: \n";
        $heap = clone $this->maxHeap;
        while (!$heap->isEmpty()) {
            echo "{$heap->extract()} ";
        }
        echo "\n\n";
    }

    public function __construct() {
        $this->maxHeap = new SplMaxHeap(); // holds the bottom half
        $this->minHeap = new SplMinHeap(); // holds the top half
    }

    public function addNewNumber($n) {

        $this->log("-------");
        $this->log("adding " . $n);

        // maxHeap.size >= minHeap.size
        if ($this->maxHeap->count() == $this->minHeap->count()) {
            if ((!$this->minHeap->isEmpty() && $n > $this->minHeap->top() )) {
                $this->log("shifting min ({$this->minHeap->top()}) into max ");
                $this->maxHeap->insert($this->minHeap->extract());
                $this->log("inserting into min " . $n);
                $this->minHeap->insert($n);
            }
            else {
                $this->log("inserting into max " . $n);
                $this->maxHeap->insert($n);
            }
        }
        else {
            if ($n < $this->maxHeap->top()) {
                $this->log("shifting max ({$this->maxHeap->top()}) into min ");
                $this->minHeap->insert($this->maxHeap->extract());
                $this->log("inserting into max " . $n);
                $this->maxHeap->insert($n);
            }
            else {
                $this->log("inserting into min " . $n);
                $this->minHeap->insert($n);
            }
        }
    }


    public function getMedian() {
        if ($this->maxHeap->isEmpty()) {
            return null;
        }
        if ($this->maxHeap->count() == $this->minHeap->count() ) {
            return ($this->maxHeap->top() + $this->minHeap->top()) / 2;
        }
        else {
            return $this->maxHeap->top();
        }

    }
}


$inputs = [ 11, 20, 5, 200, 100, 30, 50 ];
$test = new FindMedian();
foreach($inputs AS $v) {
    $test->addNewNumber($v);
}
$test->printHeaps();
echo "\nmedian: " . $test->getMedian() . "\n";
