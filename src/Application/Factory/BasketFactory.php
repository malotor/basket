<?php

namespace malotor\shoppingcart\Application\Factory;

use malotor\shoppingcart\Domain\Entity\Basket;

class BasketFactory
{
    static public function create($products = array()) {
        $basket = new Basket();
        foreach ($products as $product) {
           $basket->addItem($product);
        }
        return $basket;
    }
}
