<?php

namespace malotor\shoppingcart\Domain\Entity;

class Basket
{
	private $items = [];

    public function countItems()
    {
        return count($this->items);
    }

    public function addItem(Item $item)
    {
        $itemId = $item->getId();
        if ($this->containsItem($itemId)) {
            $itemInCart = $this->getItem($itemId);
            $itemInCart->increaseQuantity();
        }
        else  $this->items[$itemId] = $item;
    }

    public function getItem($itemId)
    {
    	return $this->items[$itemId];
    }

    public function removeItem($itemId)
    {
        unset($this->items[$itemId]);
    }

    private function containsItem($itemId) {
        return in_array($itemId, array_keys($this->items));
    }

    public function totalAmount()
    {
        $result = 0;
        foreach($this->items as $item) {
            $result += $item->getAmount();
        }
        return $result;
    }


    public function getItems()
    {
        return $this->items;
    }
}
