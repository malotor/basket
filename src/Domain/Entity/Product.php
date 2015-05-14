<?php

namespace malotor\shoppingcart\Domain\Entity;

class Product implements Item
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function increaseQuantity()
    {

    }

    public function getAmount()
    {

    }

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getQuantity()
    {
        return 1;
    }
}
