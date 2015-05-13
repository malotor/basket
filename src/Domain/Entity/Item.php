<?php

namespace malotor\shoppingcart\Domain\Entity;

interface Item
{

    public function getId();

    public function increaseQuantity();
    
}
