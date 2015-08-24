<?php


function isValid($s) {

    $bestAns = 0;
    $tmpAns = 0;
    $stack = array();

    for ($i = 0, $j = strlen($s); $i < $j; $i ++) {
        $char = $s{$i};

        if ($char == ')') {
            $last = array_pop($stack);

            if ($last != '(') {
                $stack = array();
                $tmpAns = 0;
            }
            else {
                $tmpAns += 2;

                if ($tmpAns > $bestAns) {
                    $bestAns = $tmpAns;
                }
            }

        }
        else if ($char == '(') {
            array_push($stack, $char);
        }
    }


    return $bestAns;


}


echo isValid("(()") . "\n\n";
echo isValid(")()())") . "\n\n";