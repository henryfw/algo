<?php


function rpn($inputs) {
    if (empty($inputs)) return 0;

    $ans = 0;
    while (count($inputs) >= 3) {
        $arg1 = array_shift($inputs);
        if (!is_numeric(($arg1))) throw new Exception("Invalid rpn format.");
        $arg2 = array_shift($inputs);
        if (!is_numeric(($arg2))) throw new Exception("Invalid rpn format.");
        $operator = array_shift($inputs);

        if ($operator == '+') $ans = $arg1 + $arg2;
        else if ($operator == '*') $ans = $arg1 * $arg2;
        else if ($operator == '/') $ans = $arg1 / $arg2;
        else if ($operator == '-') $ans = $arg1 - $arg2;
        else throw new Exception("Invalid rpn format.");

        array_unshift($inputs, $ans);
    }

    if (count($inputs) == 1) {
        $ans = array_shift($inputs);
        if (!is_numeric(($ans))) throw new Exception("Invalid rpn format.");
    }
    if (count($inputs) > 1) {
        throw new Exception("Invalid rpn format.");
    }

    return $ans;
}

echo rpn([3,4,'+',2,'*',1,'+']) . "\n";