<?php

use malotor\shoppingcart\Application\Factory\ProductFactory;
use malotor\shoppingcart\Domain\Entity\Product;

class ProductFacotyTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $obj = new stdClass;
        $obj->id = 1;
        $obj->price = 10.2;
        $obj->quantity = 2;
        $this->product = ProductFactory::create($obj);
    }
    public function testShouldReturnAProductObject() {
        $this->assertTrue($this->product instanceof Product);
    }

    public function testShouldReturnExceptedProduct() {
        $this->assertEquals(1, $this->product->getId());
        $this->assertEquals(20.4, $this->product->getAmount());
    }
}
