<?php


class Tower {
    public $disks = null;
    public $index = 0;

    public function __construct($index){
        $this->index = $index;
        $this->disks = array();
    }

    public function add($d) {
        $this->disks[] = $d;
    }


    public function moveToTop(Tower $other) {
        $d = array_pop($this->disks);
        $other->add($d);
    }

    public function moveDisks($n, Tower $dest, Tower $buffer) {

        if ($n > 0) {
            $this->moveDisks($n - 1, $buffer, $dest);
            $this->moveToTop($dest);
            $buffer->moveDisks($n - 1, $dest, $this);
        }

        // this.moveDisks: n - 1, buffer, dest
        // this.moveTopTo: dest
        // buffer.moveDisks: n - 1, dest, this

    }
}





$n = 3;

$towers = [];
for($i = 0; $i < 3; $i ++) {
    $towers[] = new Tower($i);
}
for($i = $n - 1; $i >= 0; $i--){
    $towers[0]->add($i);
}
$towers[0]->moveDisks($n, $towers[2], $towers[1]);


print_r($towers);