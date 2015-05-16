<?php

namespace malotor\shoppingcart\Domain\Entity;

class Product implements Item
{

    private $id;
    private $quantity;
    private $price;

    public function __construct($id, $price, $quantity = 1)
    {
        if (!is_numeric($price))
            throw new \InvalidArgumentException("Price must be numeric");

        $this->id = $id;
        $this->price = (double) $price;
        $this->quantity = $quantity;
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
