<?php

// http://www.careercup.com/question?id=5678056593162240


function getRandomCharInString($str, $n = 3) {
    $length = strlen($str);
    $chars = str_split($str);
    $ans = new SplPriorityQueue();

    for( $i = 0; $i < $n; $i ++ ) {
        $index = rand($i, $length - 1);

        $char = $chars[$index];
        $chars[$index] = $char[$i];
        $chars[$i] = $char;

        $ans->insert($char, $index);
    }


    $return = "";
    while($ans->count() > 0) {
        $return =  $ans->extract() . $return;
    }
    return $return;

}


echo getRandomCharInString("helloworld");