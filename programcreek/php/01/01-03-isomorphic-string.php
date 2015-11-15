<?php

function is_isomorphic($val1, $val2) {

    if (strlen($val1) != strlen($val2) || $val1 == '' ) {
        return 0;
    }

    $char_map = array();

    for ($i = 0, $ii = strlen($val1); $i < $ii; $i ++){
        $char1 = $val1{$i};
        $char2 = $val2{$i};

        if (!isset($char_map[$char1])) {
            $char_map[$char1] = $char2;
        }
        else {
            if ($char_map[$char1] != $char2) {
                return 0;
            }
        }
    }
    return 1;

}



echo is_isomorphic('egg', 'add') . "\n\n";
echo is_isomorphic('foo', 'bar') . "\n\n";