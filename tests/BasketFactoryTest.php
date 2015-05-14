<?php

use malotor\shoppingcart\Application\Factory\BasketFactory;
use malotor\shoppingcart\Domain\Entity\Basket;
use malotor\shoppingcart\Domain\Entity\Product;

class BasketFactoryTest extends PHPUnit_Framework_TestCase {

    public function testShouldReturnABasketObject() {

        $basket = BasketFactory::create();

        $this->assertTrue($basket instanceof Basket);
    }
}