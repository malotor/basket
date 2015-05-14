<?php

use malotor\shoppingcart\Application\Factory\ProductFactory;
use malotor\shoppingcart\Domain\Entity\Product;

class ProductFacotyTest extends PHPUnit_Framework_TestCase {

    public function testShouldReturnAProductObject() {

        $obj = new stdClass;
        $obj->id = 1;
        $obj->price = 10.2;

        $product = ProductFactory::create($obj);

        $this->assertTrue($product instanceof Product);
    }

}
