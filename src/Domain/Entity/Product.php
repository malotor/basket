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
        return $this->price;
    }

    public function __construct($id, $price)
    {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = self::INITIAL_QUANTITY;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
