<?php

function find($x) {
    for ($i = 0; $i < 63; $i ++) {
        if ((($x >> $i) & 1) != (($x >> ($i + 1)) & 1)) {
            $x ^= (1 << $i) | (1 << ($i + 1));
            return $x;
        }
    }

}


var_dump(decbin(find(0b111)));