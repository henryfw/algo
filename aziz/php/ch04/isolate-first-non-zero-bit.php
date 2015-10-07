<?php

// get first non zero bit

$x = 0b00101100;

$y = $x & ~($x - 1);

echo decbin($y) . "\n";


// replace first non zero bit with zero

$y = $x & ($x - 1);

echo decbin($y);