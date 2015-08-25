<?php

/*
 * hash table keys and values are primitives
 */
class HashTable {

    protected $maxBuckets = 1000;
    public $data = null;
    protected $size = 0;

    public function __construct($initialBuckets = null) {
        if ($initialBuckets) {
            $this->maxBuckets = $initialBuckets;
        }
        $this->resetBuckets();
    }

    protected function resetBuckets() {
        $this->data = array();
        $this->size = 0;
    }

    public function getHashIndex($key) {
        if ($key === null) {
            throw new Exception("Invalid key");
        }
        return $key % $this->maxBuckets;
    }

    public function add($key, $value) {
        $bucketIndex = $this->getHashIndex($key);
        if (!is_array($this->data[$bucketIndex])) {
            $this->data[$bucketIndex] = array();
        }
        if (!isset($this->data[$bucketIndex][$key])) {
            $this->size ++;
        }
        $this->data[$bucketIndex][$key] = $value;
    }


    public function remove($key) {
        $bucketIndex = $this->getHashIndex($key);
        if (isset($this->data[$bucketIndex]) && isset($this->data[$bucketIndex][$key])) {
            $this->size --;
            unset($this->data[$bucketIndex][$key]);
        }
    }


    public function get($key) {
        $bucketIndex = $this->getHashIndex($key);
        if (isset($this->data[$bucketIndex]) && isset($this->data[$bucketIndex][$key])) {
            return $this->data[$bucketIndex][$key];
        }

        return null;
    }

}


$table = new HashTable();

$table->add(55 ,'item 1');
$table->add(1055 ,'item 2');
$table->add(3 ,'item 3');
$table->add(30 ,'item 4');

print_r($table->data);

var_dump($table->get(1055));

var_dump($table->get(3));

var_dump($table->get(300000));
