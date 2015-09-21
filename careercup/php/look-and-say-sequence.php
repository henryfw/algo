<?php

// http://www.careercup.com/question?id=5146925198213120

function lookAndSay($nth) {

    // add 0th
    $lastValue = [
        [ '1' => 1 ] // index is number, value is the repeated count
    ] ;

    for ($i = 1; $i <= $nth; $i ++) {
        $newValue = [];
        $lastIndexValue = null;

        foreach($lastValue AS $item) {
            foreach($item AS $number => $times) {
                if ($number == $times) {
                    $newValue[] = [$number => $times == 1 ? 2 : $times ];
                    $lastIndexValue = $number;
                }
                else {
                    if ($times == $lastIndexValue) {
                        $newValue[count($newValue)-1][$times] ++;
                    }
                    else {
                        $newValue[] = [$times => 1];
                    }
                    $newValue[] = [$number => 1];
                    $lastIndexValue = $number;

                }
            }
        }

        $lastValue = $newValue;
    }
//    print_r($lastValue);
    $ans = "";
    foreach($lastValue AS $item) {
        foreach($item AS $number => $times) {
            while($times > 0) {
                $ans .= $number;
                $times --;
            }
        }
    }
    return $ans;
}


echo (lookAndSay(0)) . "\n";
echo (lookAndSay(1)) . "\n";
echo (lookAndSay(2)) . "\n";
echo (lookAndSay(3)) . "\n";
echo (lookAndSay(4)) . "\n";
echo (lookAndSay(5)) . "\n";
echo (lookAndSay(6)) . "\n";
echo (lookAndSay(7)) . "\n";
echo (lookAndSay(8)) . "\n";

//1, 11, 21, 1211, 111221, 312211, 13112221, 1113213211
