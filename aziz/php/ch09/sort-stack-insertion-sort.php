<?php

function sortStack(SplStack $inputs) {
    if (!$inputs->isEmpty()) {
        $val = $inputs->pop();
        sortStack($inputs);
        insert($val , $inputs);
    }
}

function insert($val, SplStack $inputs) {
    if ($inputs->isEmpty() || $inputs->top() < $val) {
        $inputs->push($val);
    }
    else {
        $f = $inputs->pop();
        insert($val, $inputs);
        $inputs->push($f);
    }
}



$inputs = new SplStack();
$inputs->push(110);
$inputs->push(10);
$inputs->push(210);
$inputs->push(40);
$inputs->push(11);
$inputs->push(3);

sortStack($inputs);

print_r($inputs);