<?php


// check if n is power of 2


function isPowerOf2($n) {
    return ($n & ($n-1)) == 0;
}


var_dump(isPowerOf2(2));
var_dump(isPowerOf2(4));
var_dump(isPowerOf2(8));
var_dump(isPowerOf2(23));