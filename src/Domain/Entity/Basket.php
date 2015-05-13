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
        $itemId = $item->getId();
        if (!in_array($itemId, array_keys($this->items))) {
            $this->items[$itemId] = $item;
        } else {
            $itemInCart = $this->getItem($itemId);
            $itemInCart->increaseQuantity();
        }
    
    }

    public function getItem($itemId)
    {
    	return $this->items[$itemId];
    }

    public function removeItem($itemId)
    {
        unset($this->items[$itemId]);
    }

   
}
