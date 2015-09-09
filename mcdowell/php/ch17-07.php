<?php


class Convert
{
    public $digits = [
        "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"
    ];

    public $teen = ["Eleven", "Twelve", "Thirteen",
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen",
        "Nineteen"];
    public $tens = ["Ten", "Twenty", "Thirty", "Forty",
        "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
    public $bigs = ["", "Thousand", "Million"];


    public function numToString($n) {
        if ($n == 0) return "Zero";

        if ($n < 0) return "Negative " . $this->numToString(-1 * $n);

        $count = 0;
        $str = "";

        while($n > 0) {
            if ($n % 1000 != 0) {
                $str = $this->numToString100($n % 1000) . $this->bigs[$count] . ' ' . $str;
            }
            $n /= 1000;
            $count ++;
        }

        return $str;
    }

    protected function numToString100($n) {
        $str = "";

        if ($n >= 100) {
            $str .= $this->digits[ floor($n/100) - 1 ] . " Hundred ";
            $n %= 100;
        }

        if ($n >= 11 && $n <= 19) {
            return $str . $this->teen[ $n - 11 ] . ' ';
        }

        if ($n == 10 || $n >= 20) {
            $str .= $this->tens[ floor($n/10) - 1 ] . " ";
            $n %= 10;
        }

        if ($n > 0) {
            $str .= $this->digits[$n - 1] . " ";
        }

        return $str;
    }
}


$c = new Convert();

echo $c->numToString(10023453);