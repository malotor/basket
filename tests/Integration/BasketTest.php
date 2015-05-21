<?php

use malotor\shoppingcart\Domain\Entity\Basket;
use malotor\shoppingcart\Domain\Entity\Product;


class BasketTest extends PHPUnit_Framework_TestCase {

    protected $basket;

    public function setUp() {
        $this->products[0] = new Product(1,10);
        $this->products[1] = new Product(2,5.5);

        $this->basket = new Basket();
    }

    public function testAddAProduct() {
        $this->assertEquals(0, $this->basket->countItems());
        $this->basket->addItem($this->products[0]);
        $this->assertEquals(1, $this->basket->countItems());
    }
    public function testRemoveAProduct() {
        $this->basket->addItem($this->products[0]);
        $this->basket->addItem($this->products[1]);
        $this->basket->removeItem(1);
        $this->assertEquals(1, $this->basket->countItems());
    }

    public function testIncreaseProductQuantity() {
        $this->assertEquals(1, $this->products[0]->getQuantity());
        $this->basket->addItem($this->products[0]);
        $this->basket->addItem($this->products[0]);
        $this->assertEquals(1, $this->basket->countItems());
        $this->assertEquals(2, $this->products[0]->getQuantity());
    }

    public function testCartTotalAmount() {
        $this->basket->addItem($this->products[0]);
        $this->basket->addItem($this->products[0]);
        $this->basket->addItem($this->products[1]);
        $this->assertEquals(25.5, $this->basket->totalAmount());
    }
}
