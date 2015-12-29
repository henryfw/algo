<?php

function majorityElement($inputs) {
    $result = 0;

    $count = 0;

    foreach($inputs AS $i) {
        if ($count = 0) {
            $result = $i;
            $count ++;
        }
        else if ($result == $i) {
            $count ++;
        }
        else {
            $count --;
        }
    }


    return $result;
}