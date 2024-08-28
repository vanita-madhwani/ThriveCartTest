<?php

class Offer {
    public $productCode;
    public $discountPercent;
    public $minQuantity;

    public function __construct($productCode, $discountPercent, $minQuantity) {
        $this->productCode = $productCode;
        $this->discountPercent = $discountPercent;
        $this->minQuantity = $minQuantity;
    }

    public function apply($quantity, $price) {
        $discount = 0.00;

        // Calculate discount for each second item in a pair
        if ($quantity >= $this->minQuantity) {
            $pairCount = floor($quantity / $this->minQuantity);
            $discount = $pairCount * $price * ($this->discountPercent / 100);
        }

        return $discount;
    }
}
