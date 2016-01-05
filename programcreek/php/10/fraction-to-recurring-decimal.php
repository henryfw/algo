<?php

//divide main parts as normal. then use a hash table for reminder


function fractionToDecimal($num, $dem) {
    if ($num == 0) return 0;

    if ($dem == 0) return "";

    $result = "";

    if ( ($num < 0) ^ ($dem < 0) ) {
        $result .= "-";
    }

    $quotient = floor($num/$dem);
    $result .= $quotient;

    $remainder = ($num % $dem) * 10;
    if ($remainder == 0) return $result;

    $map = [];

    $result .= ".";

    while ($remainder > 0) {
        if (isset($map[$remainder])) {
            $beg = $map[$remainder];

            $part1 = substr($result, 0, $beg);
            $part2 = substr($result, $beg);
            print_r($map);
            return $part1 . "(" . $part2 . ")";
        }

        $map[$remainder] = strlen($result);
        $quotient = floor( $remainder / $dem );
        $result .= $quotient;
        $remainder = ($remainder % $dem) * 10;


        echo "r: $remainder \n";

    }

    return $result;

}


echo fractionToDecimal(2, 3) . "\n\n";
echo fractionToDecimal(2, 7) . "\n\n";
echo fractionToDecimal(1, 9973) . "\n\n";

