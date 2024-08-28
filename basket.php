<?php

// Include the necessary class files
require_once 'src/Product.php';
require_once 'src/Basket.php';
require_once 'src/Offer.php';

// Products
$products = [
    "R01" => new Product("R01", "Red Widget", 32.95),
    "G01" => new Product("G01", "Green Widget", 24.95),
    "B01" => new Product("B01", "Blue Widget", 7.95)
];

// Delivery Charges (threshold => charge)
$deliveryCharges = [
    50 => 4.95,     // $4.95 for orders under $50
    90 => 2.95    // $2.95 for orders under $90
];

// Special Offers
$specialOffers = [
    new Offer("R01", 50, 2)   // Buy one red widget, get the second half price
];

// Initialize Basket
$basket = new Basket($products, $deliveryCharges, $specialOffers);

// Add products to the basket
$basket->add("B01");
$basket->add("G01");
echo "Total: $" . $basket->total() . PHP_EOL; // Example 1

$basket = new Basket($products, $deliveryCharges, $specialOffers);
$basket->add("R01");
$basket->add("R01");
echo "Total: $" . $basket->total() . PHP_EOL; // Example 2

$basket = new Basket($products, $deliveryCharges, $specialOffers);
$basket->add("R01");
$basket->add("G01");
echo "Total: $" . $basket->total() . PHP_EOL; // Example 3

$basket = new Basket($products, $deliveryCharges, $specialOffers);
$basket->add("B01");
$basket->add("B01");
$basket->add("R01");
$basket->add("R01");
echo "Total: $" . $basket->total() . PHP_EOL; // Example 4
