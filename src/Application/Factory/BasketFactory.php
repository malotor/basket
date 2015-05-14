<?php

namespace malotor\shoppingcart\Application\Factory;

use malotor\shoppingcart\Domain\Entity\Basket;

class BasketFactory
{
    static public function create() {
        return new Basket();
    }
}
