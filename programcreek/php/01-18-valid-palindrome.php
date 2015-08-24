<?php




function isValid($text) {
    $text = strtolower(trim($text));

    if ($text === '') {
        return 1;
    }


    $left = 0;
    $right = strlen($text) - 1;

    while ($left < $right) {

        $leftChar = $text{$left};
        if (!isGoodChar($leftChar)) {
            $left ++;
            continue;
        }

        $rightChar = $text{$right};
        if (!isGoodChar($rightChar)) {
            $right --;
            continue;
        }


        if ($leftChar != $rightChar) {
            return false;
        }
        else {
            $left ++;
            $right -- ;
        }

    }

    return true;

}

function isGoodChar($a) {
    return preg_match('/^[a-z0-9]$/', $a);
}


var_dump(isValid('Red rum, sir, is murder')) ;