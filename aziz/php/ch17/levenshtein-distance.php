<?php

function levenshteinDistance($from, $to) {
    if (strlen($from) < strlen($to)) {
        list($from, $to) = [$to, $from];
    }

    $distance = [];

    for ($i = 0; $i <= strlen($to); $i ++ ) {
        $distance[] = $i;
    }


    for ($i = 1; $i <= strlen($from); $i ++) {
        $preI1J1 = $distance[0];
        $distance[0] = $i;

        echo "\n\$preI1J1: $preI1J1, \$distance[0]: $i \n";
        echo "distance: " . implode(",", $distance) . "\n\n\n\n";

        for ($j = 1; $j <= strlen($to); $j++) {
            $preI1J = $distance[$j];

            $distance[$j] = $from{$i - 1} == $to{$j - 1} ?
                $preI1J1 : 1 + min($preI1J1, min($distance[$j - 1], $preI1J));


            echo "i: $i, j: $j, letters: {$from{$i - 1}} == {$to{$j - 1}}\n";
            echo "\$preI1J1 $preI1J1, \$preI1J $preI1J, \$distance[\$j - 1]: {$distance[$j - 1]} \n";
            echo "ans: {$distance[$j]}\n";

            $preI1J1 = $preI1J;

        }
    }


    print_r($distance);

    return end($distance);
}


echo levenshteinDistance('abcdef', 'azcdd');
