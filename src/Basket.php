<?php

class Basket {
    private $products;
    private $deliveryCharges;
    private $offers;
    private $items = [];

    public function __construct($products, $deliveryCharges, $offers) {
        $this->products = $products;
        $this->deliveryCharges = $deliveryCharges;
        $this->offers = $offers;
    }

    public function add($productCode) {
        if (isset($this->products[$productCode])) {
            $this->items[] = $this->products[$productCode];
        }
    }

    public function total() {
        $total = 0.00;
        $itemCounts = [];

        // Calculate total price without offers
        foreach ($this->items as $item) {
            $total += $item->price;
            if (!isset($itemCounts[$item->code])) {
                $itemCounts[$item->code] = 0;
            }
            $itemCounts[$item->code]++;
        }

        // Apply special offers
        foreach ($this->offers as $offer) {
            if (isset($itemCounts[$offer->productCode])) {
                $total -= $offer->apply($itemCounts[$offer->productCode], $this->products[$offer->productCode]->price);
            }
        }

        // Apply delivery charges
        foreach ($this->deliveryCharges as $threshold => $charge) {
            if ($total < $threshold) {
                $total += $charge;
                break;
            }
        }

        return round($total, 2);
    }
}
