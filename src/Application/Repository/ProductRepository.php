<?php

namespace malotor\shoppingcart\Application\Repository;

use malotor\shoppingcart\Domain\Entity\Product;

interface ProductRepository
{
	/**
	* @return Product
	*/
    public function get($productId);
}
