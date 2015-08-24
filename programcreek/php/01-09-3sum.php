<?php


function threeSum($list) {
    $result = array();

    if (count($list) < 3) return $result;

    sort($list);

    for ($i = 0; $i < count($list) - 2; $i ++) {
        if ($i == 0 || $list[$i] > $list[$i - 1]) {
            $negate = - $list[$i];

            $start = $i + 1;
            $end = count($list) - 1;

            while ( $start < $end ) {

                if ($list[$start] + $list[$end] == $negate) {

                    $result[] = [ $list[$i], $list[$start], $list[$end] ];
                    $start ++ ;
                    $end --;

                    while ($start < $end && $list[$end] == $list[$end + 1]) {
                        $end --;
                    }
                    while ($start < $end && $list[$start] == $list[$start - 1]) {
                        $start ++;
                    }
                }
                else if ($list[$start] + $list[$end] < $negate) {
                    $start ++;
                }
                else {
                    $end --;
                }
            }
        }
    }

    return $result;
}


print_r(threeSum([-1, 0, 1, 2, -1, -4, 1]));