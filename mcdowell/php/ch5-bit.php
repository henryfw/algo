<?php


function getBit($n, $i) {
    return $n & (1 << $i);
}

function setBit($n, $i) {
    return $n | (1 << $i) ;
}

function clearBit($n, $i) {
    return $n & ~(1 << $i);;
}

// include $i
function clearBitGreaterThanI($n, $i) {
    return $n & (1 << $i) - 1;
}

// include $i
function clearBitLessThanI($n, $i) {
    return $n &  ~((1 << ($i + 1)) - 1);
}

function updateBit($n, $i, $v) {
//    return ($n & ~(1 << $i)) | ($v << $i);
    $n = clearBit($n, $i);
    if ($v) $n = setBit($n, $v);
    return $n;
}

echo getBit(0b1001, 1) . "\n";
echo decbin( setBit(0b1001, 4) ). "\n";
echo decbin( clearBit(0b1111, 1) ). "\n";
echo decbin( clearBitGreaterThanI(0b1111, 1) ). "\n";
echo decbin( clearBitLessThanI(0b1111, 1) ). "\n";
echo decbin( updateBit(0b1111, 1, 0) ). "\n";
echo decbin( updateBit(0b1111, 4, 1) ). "\n";

