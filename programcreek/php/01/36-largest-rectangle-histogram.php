<?php

function largestRectangleArea($inputs) {
    $stack = new SplStack(); // The stack only keeps the increasing bar index

    $max = 0;
    $i = 0;

    while ($i < count($inputs)) {
        if (!$stack->count() || $inputs[$i] >= $inputs[$stack->top()] ) {
            $stack->push($i);
            $i ++;
        }
        else {
            $p = $stack->pop();
            $h = $inputs[$p];

            $w = $stack->count() ? $i - $stack->top() - 1 : $i;

            $max = max($h * $w, $max);

            echo "max at $i is $max, w*h is " . ($h * $w) . "\n";
        }
    }


    while ($stack->count()) {

        $p = $stack->pop();
        $h = $inputs[$p];

        $w = $stack->count() ? $i - $stack->top() - 1 : $i;

        $max = max($h * $w, $max);
        echo "max at $i is $max, w*h is " . ($h * $w) . "\n";
    }

    return $max;

}


echo largestRectangleArea( [2,1,2.1,0.1]) ;