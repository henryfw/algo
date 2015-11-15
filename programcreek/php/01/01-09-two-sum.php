<?php

function twoSum($list, $target) {

    for($i = 0; $i < count($list) - 1; $i ++ ){
        for($j = $i + 1; $j < count($list); $j ++) {
            if ($list[$i] + $list[$j] == $target) {
                return [$i, $j];
            }
        }
    }
    return null;

}


function twoSumWithHash($list, $target) {
    $map = array();
    for($i = 0; $i < count($list); $i ++) {
        if (isset($map[$list[$i]])) {
            return [$map[$list[$i]], $i];
        }
        else {
            $map[$target - $list[$i]] = $i;
        }
    }

    return null;
}


function twoSumWithSortedInput($list, $target) {
    $start = 0;
    $end = count($list) - 1;

    while ($start < $end) {
        $sum = $list[$start] + $list[$end];
        if ($sum == $target) {
            return [$start, $end];
        }
        if ($sum < $target) {
            $start ++;
        }
        else {
            $end --;
        }
    }

    return null;
}

class TwoSumData {
    protected $map = array();

    public function add($i) {
        $this->map[$i] += 1;
    }
    public function find($target) {
        foreach(array_keys($this->map) AS $i) {
            $reminder = $target - $i;
            if (isset($this->map[$reminder])) {
                if ($reminder == $i) {
                    return $this->map[$reminder] >= 2;
                }
                return true;
            }
        }
        return false;
    }
}



print_r(twoSum([2,7,11,15], 22));
print_r(twoSumWithHash([2,7,11,15], 22));

print_r(twoSumWithSortedInput([2,7,11,15,16,19,23,33], 30));


$c = new TwoSumData();
$c->add(1);
$c->add(3);
$c->add(7);
echo (int) $c->find(4) . "\n\n";
echo (int) $c->find(7) . "\n\n";
echo (int) $c->find(6) . "\n\n";