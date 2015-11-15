<?php


function isValid($s) {

    $openMap = array(
        '{' => '}',
        '[' => ']',
        '(' => ')',
    );
    $closeMap = array_flip($openMap);

    $workingStack = array();

    for ($i = 0, $j = strlen($s); $i < $j; $i ++) {
        if ( isset($closeMap[$s{$i}]) ) {
            $properOpen = $closeMap[$s{$i}];

            // top of open must be corresponding
            $last = array_pop($workingStack);

            if ($last != $properOpen) {
                return 0;
            }

        }
        else if (isset($openMap[$s{$i}])) {
            array_push($workingStack, $s{$i});
        }
    }

    return (int) empty($workingStack) ;

}


echo isValid("(9 + 7 * [a{b}] )") . "\n\n";
echo isValid("(9 + 7 * [a{b(}] )") . "\n\n";
echo isValid("(9 + 7 * 1") . "\n\n";
echo isValid("()") . "\n\n";
echo isValid("asdf") . "\n\n";