<?php

// http://www.careercup.com/question?id=5717567253512192


function reverseSentence($str) {
    $str = trim($str);

    $end = strlen($str)  - 1;
    $start = $end;

    while($start >= -1) {

        if ($start == 0 ) {
            for ($i = 0; $i <= $end; $i++) {
                echo $str[$i];

            }
            echo " ";

            $start--;
            $end = $start;
        }
        else  if (  $str{$start} == ' ') {
            for ($i = $start + 1; $i <= $end; $i++) {
                echo $str[$i];
            }
            echo " ";
            $start--;
            $end = $start;
        }
        else {
            $start --;
        }


    }

}


reverseSentence("Hi there you");