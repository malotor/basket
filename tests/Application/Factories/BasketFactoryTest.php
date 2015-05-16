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

        $products[0] = new stdClass();
        $products[0]->id = 1;
        $products[0]->price = 10;
        $products[0]->quantity = 1;

        $products[1] = new stdClass();
        $products[1]->id = 2;
        $products[1]->price = 11.5;
        $products[1]->quantity = 2;

        $basket = BasketFactory::create($products);

        $product = $basket->getItem(1);
    
        $this->assertTrue($product instanceof Product);

        $productB = $basket->getItem(2);

        $this->assertTrue($productB instanceof Product);
    }

}