<?php

namespace malotor\shoppingcart\Application\Repository;

use malotor\shoppingcart\Domain\Entity\Basket;

interface BasketRepository
{
	/**
	* @return Basket
	*/
    public function get($basketId);

    public function save(Basket $baset);
}
