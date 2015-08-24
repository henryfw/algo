<?php


function fourSum($list, $target) {
    sort($list);

    $done = array();
    $result = array();

    for ($i = 0; $i < count($list); $i ++) {
        for ($j = $i + 1; $j < count($list); $j ++) {
            $k = $j + 1;
            $l = count($list) - 1;

            while($k < $l) {

                $total = $list[$i] + $list[$j] + $list[$k] + $list[$l];

                if ($total < $target) {
                    $k ++;
                }
                else if ($total > $target) {
                    $l --;
                }

                else {

                    $temp = [$list[$i], $list[$j], $list[$k], $list[$l]];
                    $tempKey = implode('|', $temp);

                    if (!isset($done[$tempKey])) {
                        $done[$tempKey] = 1;
                        $result[] = $temp;
                        $k ++;
                        $l --;
                    }


                }
            }
        }
    }

    return $result;
}




print_r( fourSum([1, 0, -1, 0, -2, 2], 0) );