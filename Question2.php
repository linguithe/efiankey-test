<?php
function checkDiscount($purchaseValue) {
    if (!is_int($purchaseValue) && !is_float($purchaseValue)) return "Invalid input, please enter a number!";

    $discount = $purchaseValue >= 500 ? 10 : ($purchaseValue >= 100 && $purchaseValue < 500 ? 5 : 0);
    return $discount > 0 ? "Purchase Value is $purchaseValue, discount is $discount%" : "Purchase Value is $purchaseValue, there are no discounts.";
}

// Testing
echo checkDiscount(600) . "\n";
echo checkDiscount(300) . "\n";
echo checkDiscount(80) . "\n";
echo checkDiscount(2.50) . "\n";
echo checkDiscount("123") . "\n";
    
?>