<?php

namespace malotor\shoppingcart\Application\Factory;

use malotor\shoppingcart\Domain\Entity\Product;

class ProductFactory
{
    static public function create($object) {
        return new Product($object->id, $object->price);
    }
}
