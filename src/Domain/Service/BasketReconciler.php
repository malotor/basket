<?php

namespace malotor\shoppingcart\Domain\Service;

use malotor\shoppingcart\Domain\Entity\Basket;

class BasketReconciler
{

    public function totalAmount($basket)
    {
    	$result = 0;
    	$items = $basket->getItems();
        foreach ($items as $item) {
        	$result += $this->itemReconciler->getAmount($item);
        }
        return $result;
    }

    public function __construct($itemReconciler)
    {
        $this->itemReconciler = $itemReconciler;
    }
}
