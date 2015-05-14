<?php

namespace malotor\shoppingcart\Domain\Entity;

class Product implements Item
{

    const INITIAL_QUANTITY = 1;

    private $id;
    private $quantity;

    public function getId()
    {
        return $this->id;
    }

    public function increaseQuantity()
    {
        $this->quantity++;
    }

    public function getAmount()
    {

    }

    public function __construct($id)
    {
        $this->id = $id;
        $this->quantity = self::INITIAL_QUANTITY;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
