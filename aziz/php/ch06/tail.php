<?php

function tail($file, $n = 3) {
    $ans = [];

    fseek($file, -1, SEEK_END);
    if (fread($file, 1) == "\n") {
        fseek($file, -2, SEEK_END);
        $i = 2;
    }
    else {
        fseek($file, -1, SEEK_END);
        $i = 1;
    }


    while ($n > 0 && ftell($file) >= 0) {
        $buffer = "";

        while (ftell($file) >= 0 && ($in = fread($file, 1)) != "\n" ) {
            $i ++;
            $buffer = $in . $buffer;
            fseek($file, - $i, SEEK_END);
        }


        $i += 2;
        fseek($file, - $i, SEEK_END);

        array_unshift($ans, $buffer);
        $n --;

    }

    return $ans;
}



$content = "
line1
line2
line3
line4
line5
line6
line7
line8";

file_put_contents("tail-tmp.txt", $content);

$file = fopen("tail-tmp.txt", "r");

var_dump(tail($file));

fclose($file);

unlink("tail-tmp.txt");