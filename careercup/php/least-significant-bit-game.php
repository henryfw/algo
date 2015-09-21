<?php

// http://www.careercup.com/question?id=5399897561890816

// count the number of zeros between the ones. if even player A lose, else player A wins
function checkWhoWins($input) {
    $zeros = 0;
    while ($input > 0) {
        if ( !($input & 1)) {
            $zeros ++;
        }
        $input = $input >> 1;
    }

    return $zeros % 2 == 0 ? 'B' : 'A';
}

echo checkWhoWins(0b10101);