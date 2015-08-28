<?php


function testIsset($n) {
    $start = microtime(1);

    $data = array();

    $i = $n;
    while (--$i >= 0) {
        $data[rand()] = 1;
    }

    $i = $n;
    while (--$i >= 0) {
        $test = isset($data[rand()]);
    }

    return [
        'time' => microtime(1) - $start,
        'space' => memory_get_peak_usage()
    ];

}

function testInArray($n) {
    $start = microtime(1);

    $data = array();

    $i = $n;
    while (--$i >= 0) {
        $data[] = rand();
    }

    $i = $n;
    while (--$i >= 0) {
        $test = in_array(rand(), $data);
    }

    return [
        'time' => microtime(1) - $start,
        'space' => memory_get_peak_usage()
    ];

}


print_r(testIsset(10000));
print_r(testInArray(10000));