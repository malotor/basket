<?php

namespace malotor\shoppingcart\Domain\Entity;

class Product implements Item
{
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
        $this->quantity = 1;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
