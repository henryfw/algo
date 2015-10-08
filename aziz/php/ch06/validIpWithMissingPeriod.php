<?php
// use 3 for loops
function getValidIp($str) {

    if (!function_exists('isValid')) {
        function isValid($n) {
            if (strlen($n) == 0 || strlen($n) > 3) return false;
            $n = (int) $n;
            return $n < 255 && $n >= 0;
        }
    }

    $ans  = [];

    for ($i = 1; $i < 4; $i ++ ){

        $first = substr($str, 0, $i);
        if (isValid($first)) {

            for ($j = 1; $i + $j < strlen($str)  && $j < 4; $j ++ ){
                $second = substr($str, $i, $j);
                if (isValid($second)) {

                    for ($k = 1; $i + $j + $k < strlen($str) && $k < 4; $k ++) {
                        $third = substr($str, $i + $j, $k);
                        $fourth = substr($str, $i + $j + $k);

                        if (isValid($third) && isValid($fourth)) {
                            $ans[] = "$first.$second.$third.$fourth";
                        }

                    }

                }
            }

        }
    }

    return $ans;
}

print_r(getValidIp("1111"));
print_r(getValidIp("19216811"));
print_r(getValidIp("0000"));