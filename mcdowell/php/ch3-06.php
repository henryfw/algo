<?php
require "ch3-stacks-queues.php";


function sortStack(Stack $stack) {

    $tmpStack = new Stack();

    while ($item = $stack->pop()) {

        if (!$tmpStack->size()) {
            $tmpStack->push($item);
        }
        else {
            if ($item < $tmpStack->peek() ) {
                // move stuff from tmpStack to stack until item is > tmpStack item

                $movedItems = 0;
                while (true) {
                    $tmpStackValue = $tmpStack->pop();
                    $stack->push($tmpStackValue);
                    $movedItems ++;
                    if ($item >= $tmpStack->peek() || $tmpStack->size() == 0) {
                        break;
                    }
                }

                // add item from stack to tmp stack
                $tmpStack->push($item);

                // add rest of what was tmp stack from stack
                for ($i = 0; $i < $movedItems; $i ++) {
                    $tmpStackValue = $stack->pop();
                    $tmpStack->push($tmpStackValue);
                }
            }
        }
    }
    return $tmpStack;
}


$stack = new Stack();
$stack->push(5);
$stack->push(15);
$stack->push(1);
$stack->push(3);
$stack->push(8);
$stack->push(25);

$newStack = sortStack($stack);
print_r($newStack->data);


