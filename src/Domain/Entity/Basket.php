<?php

namespace malotor\shoppingcart\Domain\Entity;

class Basket
{
	private $items = [];

    public function countItems()
    {
        return count($this->items);
    }

    public function addItem($item)
    {
        $this->items[$item->getId()] = $item;
    }

    public function getItem($itemId)
    {
    	return $this->items[$itemId];
    }
}
