<?php

namespace malotor\shoppingcart\Domain\Entity;

class Product implements Item
{

    const INITIAL_QUANTITY = 1;

    private $id;
    private $quantity;

    public function __construct($id, $price)
    {
        if (!is_numeric($price))
            throw new \InvalidArgumentException("Price must be numeric");

        $this->id = $id;
        $this->price = (double) $price;
        $this->quantity = self::INITIAL_QUANTITY;
    }

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
        return $this->price * $this->quantity;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }
}
