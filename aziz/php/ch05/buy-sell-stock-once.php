<?php

function buySellStockOnce($inputs) {
    $minPrice = PHP_INT_MAX;
    $maxProfit = 0;

    foreach($inputs AS $i) {
        $maxProfit = max($maxProfit, $i - $minPrice);
        $minPrice = min($minPrice, $i);
    }

    return $minPrice;

}