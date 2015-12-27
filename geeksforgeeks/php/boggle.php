<?php



function findWords($inputs) {
    $blanks = array_fill(0, count($inputs[0]), false);
    $visited = array_fill(0, count($inputs), $blanks);

    $str = "";

    for ($i = 0; $i < count($inputs); $i ++ ) {
        for($j = 0; $j < count($inputs[0]); $j ++) {
            findWordsUtil($inputs, $visited, $i, $j, $str);
        }
    }
}

function findWordsUtil($inputs, &$visited, $i, $j, &$str) {
    echo "calling wordUtil with $i, $j, $str\n";
    $visited[$i][$j] = true;

    $str .= $inputs[$i][$j];

    if (isWord($str)) echo "word: $str\n";

    for ($row = $i - 1; $row <= $i + 1 & $row < count($inputs); $row ++ ) {
        for ($col = $j - 1; $col <= $j + 1 && $col < count($inputs[0]) ; $col ++ ) {
            if ($row >= 0 && $col >= 0 && !$visited[$row][$col] ) {
                findWordsUtil($inputs, $visited, $row, $col, $str);
            }
        }
    }

    $str = substr($str, 0, -1);
    $visited[$i][$j] = false;
}


function isWord($str) {
    return in_array($str, ["GEEKS", "FOR", "QUIZ", "GO"]);
}


findWords([
    ['G', 'I', 'Z'],
    ['U', 'E', 'K'],
    ['Q', 'S', 'E'],
]);