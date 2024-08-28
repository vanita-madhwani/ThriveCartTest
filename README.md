# Basket System

## Description
This is a simple basket system for Acme Widget Co, where customers can add products to their basket, and the system calculates the total cost, including delivery charges and any special offers.

## How to Run
1. Clone the repository.
2. Run `php basket.php` to execute the examples provided in the main logic.

## Classes
- **Product**: Represents a product with a code, name, and price.
- **Basket**: Manages the items added to the basket and calculates the total cost, applying delivery charges and special offers.
- **Offer**: Represents a special offer, like "Buy one red widget, get the second half price."

## Assumptions
- The offer applies only once per two red widgets.
- Delivery charges are applied based on the total after special offers are calculated.

## Example Outputs
1. Basket with `B01, G01`: **$37.85**
2. Basket with `R01, R01`: **$54.37**
3. Basket with `R01, G01`: **$60.85**
4. Basket with `B01, B01, R01, R01`: **$98.27**
