<?php


class StringWithDistance {
    public $string = null;
    public $distance = null;
    public function __construct($s, $d) {
        $this->string = $s;
        $this->distance = $d;
    }
}

// $D is hash
function transformString($D, $s, $t) {
    $q = [];

    unset($D[$s]);

    $q[] = new StringWithDistance($s, 0);


    $f = null;

    while ( ($f = array_shift($q)) != null ) {
        if ($f->string == $t ) {
            return $f->distance;
        }


        $str = $f->string;

        for ($i = 0; $i < strlen($str); $i ++ ) {
            $strStart = $i == 0 ? "" : substr($str, 0, $i);
            $strEnd = $i + 1 < strlen($str) ? substr($str, $i + 1) : "";

            for ($j = 0; $j < 26; $j ++ ) {
                $modStr = $strStart . chr(ord('a') + $j) . $strEnd;
                if (isset($D[$modStr])) {
                    unset($D[$modStr]);
                    $q[] = new StringWithDistance($modStr, $f->distance + 1);
                }
            }
        }

    }

    return -1;
}
