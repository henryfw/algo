<?php

function nQueens($n) {
    $placement = [];
    $result = [];
    helper($n, 0, $placement, $result);
    return $result;
}

function helper($n, $row, &$colPlacement, &$result) {
    echo "calling $n, $row. " . implode(",", $colPlacement) . "\n";
    if ($row == $n) {
        $result[] = $colPlacement;
    }
    else {
        for ($col = 0; $col < $n; $col ++){
            $colPlacement[] = $col;
            echo "  isValid " . ((int)isValid($colPlacement)) . ": " . implode(",", $colPlacement) . "\n";
            if (isValid($colPlacement)) {
                helper($n, $row + 1, $colPlacement, $result);
            }
            array_pop($colPlacement);
        }
    }
}


function isValid($colPlacement) {
    $rowId = count($colPlacement) - 1;
    for($i = 0; $i < $rowId; $i ++ ) {
        $diff = abs($colPlacement[$i] - $colPlacement[$rowId]);
        if ($diff == 0 || $diff == $rowId - $i) {
            return false;
        }
    }
    return true;
}

print_r(nQueens(4));
