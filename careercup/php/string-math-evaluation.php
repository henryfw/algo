<?php

function evaluate($input) {
    $variables = func_get_args();
    array_shift($variables);

    $input = trim($input);

    if ($input{0} == '-') {
        $input = '0' . $input;
    }

    $part1 = preg_split("/[\\+\\-\\/\\*]/", $input);
    $part1 = array_filter(array_map('trim', $part1), function($a) {
        return $a !== ' ';
    });

    // fill in variables with numbers
    for ($i = 0; $i < count($part1); $i ++) {
        $chars = $part1[$i];
        if (!preg_match("/[0-9]+/", $chars)) {
            $index = ord(strtolower($chars)) - ord('a');
            if (!isset($variables[$index])) {
                throw new Exception("var is not defined at $index - $input");
            }
            $part1[$i] = $variables[
                $index
            ];
        }
    }

    $part2 = preg_split("/([a-z0-9\\.]+)/", $input);
    $part2 = array_filter(array_map('trim', $part2));

    $parts = [];
    for ($i = 0; $i < count($part1); $i++) {
        if (isset($part2[$i])) {
            $parts[] = $part2[$i];
        }
        $parts[] = $part1[$i];
    }


    $numberStack = [];
    $operationStack = [];

    $lastNumber = intval($parts[0]);

    for ($i = 0; $i < count($parts); $i ++) {


        $chars = $parts[$i];

        if ($parts[$i - 1] == '+' || $parts[$i - 1] == '-') {
            $operationStack[] = $parts[$i - 1];
            $numberStack[] = $lastNumber;
            $lastNumber = intval($chars);
        }

        else if ($parts[$i - 1] == '*'  ) {
            $lastNumber = $lastNumber * intval($chars);
        }
        else if ( $parts[$i - 1] == '/') {
            $lastNumber = $lastNumber / intval($chars);
        }

    }

    while (count($operationStack) > 0) {
        $operation = array_pop($operationStack);

        if ($operation == '+') {
            $lastNumber += array_pop($numberStack);
        }
        else if ($operation == '-') {
            $lastNumber -= array_pop($numberStack);
        }
    }

    return $lastNumber;
}


echo evaluate("-1+2+3") . "\n";
echo evaluate("1*2+3") . "\n";
echo evaluate("1+2*3+5*10+5+5") . "\n";
echo evaluate("1*2*3") . "\n";
echo evaluate("a*b*c", 1,2,3) . "\n";