<?php

class BinaryNodeWithLock {
    public $left;
    public $right;
    protected $locked = false;
    protected $numLockedDescendatns = 0;
    public $parent;

    public function isLocked() { return $this->locked; }

    public function lock() {
        if ($this->numLockedDescendatns > 0 || $this->locked) return false;

        for ($iter = $this->parent; $iter; $iter = $iter->parent) {
            if ($iter->locked) return false;
        }

        $this->locked = true;

        for ($iter = $this->parent; $iter; $iter = $iter->parent) {
            $iter->numLockedDescendatns ++;
        }
        return true;
    }

    public function unlock() {
        if ($this->locked) {
            $this->locked = false;

            for ($iter = $this->parent; $iter; $iter = $iter->parent) {
                $iter->numLockedDescendatns --;
            }

        }
    }
}