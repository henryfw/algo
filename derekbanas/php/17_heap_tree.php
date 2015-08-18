<?php


class MinHeap {
    public $data = null;
    public $size = null;
    public $maxSize = null;

    public function __construct($size = 100) {
        $this->maxSize = $size;
        $this->data = array_fill(0, $size, -1);
    }

    public function getMin() {
        if ($this->size == 0) {
            return null;
        }
        return $this->data[0];
    }

    public function getParentIndex($index) {
        return floor ( ($index - 1) / 2);
    }

    public function getLeftIndex($index) {
        return $index * 2 + 1;
    }

    public function getRightIndex($index) {
        return $index * 2 + 2;
    }

    public function add($value) {
        if ($this->size >= $this->maxSize) {
            throw new Exception("Max size reached");
        }
        $this->size ++;
        $this->data[ $this->size - 1 ] = $value;
        $this->siftUp($this->size - 1);
    }

    protected function siftUp($index) {
        if ($index == 0) {
            return;
        }
        $parentIndex = $this->getParentIndex($index);
        if ($this->data[$index] < $this->data[$parentIndex]) {
            $tmp = $this->data[$index];
            $this->data[$index] = $this->data[$parentIndex];
            $this->data[$parentIndex] = $tmp;
            $this->siftUp($parentIndex);
        }

    }

    public function removeMin() {
        if ($this->size == 0) {
            return null;
        }
        $result = $this->data[0];
        $this->data[0] = $this->data[ $this->size - 1];
        $this->size --;
        $this->siftDown(0);
        return $result;

    }

    protected function siftDown($index) {

        $left_index = $this->getLeftIndex($index);
        $right_index = $this->getRightIndex($index);
        $index_to_use = -1;
        if ($left_index < $this->size && $this->data[$left_index] < $this->data[$index]) {
            if ($right_index < $this->size) {
                $index_to_use = $this->data[$left_index] <= $this->data[$right_index] ? $left_index : $right_index;
            }
            else {
                $index_to_use = $left_index;
            }

        }
        else if ($right_index < $this->size && $this->data[$right_index] < $this->data[$index]) {
            $index_to_use = $right_index;
        }

        if ($index_to_use != -1) {
            $tmp = $this->data[$index];
            $this->data[$index] = $this->data[$index_to_use];
            $this->data[$index_to_use] = $tmp;
            $this->siftDown($index_to_use);
        }
    }

    public function sort() {
        $tmp = clone $this;
        $result = array();
        while ($tmp->size > 0) {
            $result[] = $tmp->removeMin();
        }
        return $result;
    }

    public function __toString() {
        $value = "";
        $i = $this->size;
        while( $i > 0 ) {
            $i --;
            $value = $this->data[$i] . " $value";
        }
        return $value;
    }
}





$inputs = [
    1, 23, 4, 434, 232, 324, 11, 2323, 5
];

$tree = new MinHeap(100);

foreach($inputs AS $v) {
    $tree->add($v);
}

echo $tree . "\n\n";

print_r( $tree->sort());

echo "\n\n";

echo $tree->removeMin() . "\n\n";

echo $tree . "\n\n";
