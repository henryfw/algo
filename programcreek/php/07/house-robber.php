<?php
/*
 *
You are a professional robber planning to rob houses along a street. Each house has a certain amount
of money stashed, the only constraint stopping you from robbing each of them is that adjacent houses
have security system connected and it will automatically contact the police if two adjacent houses
were broken into on the same night.

Given a list of non-negative integers representing the amount of money of each house, determine the
maximum amount of money you can rob tonight without alerting the police.


 */

function rob($inputs) {
    $n = count($inputs);

    $dp = [0, $inputs[0]];

    for ($i = 2; $i < $n + 1; $i ++ ){
        $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $inputs[$i - 1]);
    }

    return $dp[$n];

}