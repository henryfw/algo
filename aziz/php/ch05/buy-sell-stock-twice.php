<?php

function buySellStockTwice($inputs) {
    $maxProfit = 0;
    $firstBuySellProfits = [];
    $minPrice = PHP_INT_MAX;

    for ($i = 0; $i < count($inputs); $i ++ ) {
        $minPrice = min($minPrice, $inputs[$i]);
        $maxProfit = max($maxProfit, $inputs[$i] - $minPrice);
        $firstBuySellProfits[$i] = $maxProfit;
    }

    $maxPrice = -1;
    for ($i = count($inputs) - 1; $i > 0; $i --) {
        $maxPrice = max($maxPrice, $inputs[$i]);
        $maxProfit = max($maxProfit, $maxPrice - $inputs[$i] + $firstBuySellProfits[$i - 1]);
    }

    return $maxProfit;

}