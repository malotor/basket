<?php

namespace malotor\shoppingcart\Domain\Entity;

class Basket
{
	private $numberOfItems = 0;

    public function countItems()
    {
        return $this->numberOfItems;
    }

    public function addItem($argument1)
    {
        $this->numberOfItems++;
    }
}
