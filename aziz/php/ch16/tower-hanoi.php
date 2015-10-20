<?php

function towerHanoi($rings = [1,2,3,4,5,6,7,8]) {
    $pegs = [$rings, [], []];
    helper(count($rings), $pegs, 0, 1, 2);
    return $pegs;
}


function helper($ringsToMove, &$pegs, $fromPeg, $toPeg, $usePeg) {
    static $numSteps = 0;

    if ($ringsToMove > 0) {
        echo "\n\n\nCalling. ToMove: $ringsToMove, from: $fromPeg, to: $toPeg, use: $usePeg \n  ";
        printPegs($pegs);

        helper($ringsToMove - 1, $pegs, $fromPeg, $usePeg, $toPeg);

        echo "  Move from peg $fromPeg, value: " . end($pegs[$fromPeg]) . ", to peg  $toPeg \n  ";

        $pegs[$toPeg][] = array_pop($pegs[$fromPeg]);

        printPegs($pegs);

        $numSteps ++;

        helper($ringsToMove - 1, $pegs, $usePeg, $toPeg, $fromPeg);
    }
}

function printPegs($pegs) {
    foreach ($pegs AS $k => $v) {
        echo "$k: " . implode( "," , $v) . "  ";
    }
    echo "\n";
}

print_r(towerHanoi());

