<?php

/**
 * @param $node
 * @return array('height' => 1, 'balanced' => true)
 */
function checkBalance($node) {
    if (!$node) return ['height' => -1, 'balanced' => true];

    $leftResult = checkBalance($node->left) ;
    if ($leftResult['balanced'] == false) return false;

    $rightResult = checkBalance($node->right);
    if ($rightResult['balanced'] == false) return false;

    $isBalanced = abs($leftResult['height'] - $rightResult['height']) <= 1;
    $height = max($leftResult['height'], $rightResult['height']) + 1;

    return [
        'height' => $height,
        'balanced' => $isBalanced,
    ];

}