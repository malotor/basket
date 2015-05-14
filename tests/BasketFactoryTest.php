<?php

use malotor\shoppingcart\Application\Factory\BasketFactory;
use malotor\shoppingcart\Domain\Entity\Basket;
use malotor\shoppingcart\Domain\Entity\Product;

class BasketFactoryTest extends PHPUnit_Framework_TestCase {

    public function testShouldReturnABasketObject() {
        
        $basket = BasketFactory::create();

        $this->assertTrue($basket instanceof Basket);
    }

    public function testShoudlReturnABasketWithProducts()
    {
        $products[0] = new Product(1, 10);
        $products[1] = new Product(2, 29.2);
        
        $basket = BasketFactory::create($products);

        $product = $basket->getItem(1);
    
        $this->assertEquals($products[0], $product);
    }

}