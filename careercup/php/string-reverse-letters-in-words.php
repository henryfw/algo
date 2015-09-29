<?php

// http://www.careercup.com/question?id=5106757177180160

function reverseLettersInWords($str) {


    $length = strlen($str);
    $index = 0;
    $buffer = "";

    while ($index < $length) {
        if ($str{$index} == ' ') {
            echo $buffer . ' ';
            $buffer = "";
        }
        else {
            $buffer = $str{$index} . $buffer;

        }
        $index ++;
    }
    echo $buffer;

}


reverseLettersInWords("the boy ran");