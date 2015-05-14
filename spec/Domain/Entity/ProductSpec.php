<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{

    private $itemId;
    private $price;

    function let()
    {
        $this->price = rand(1,30);
        $this->itemId = rand(1,10);
        $this->beConstructedWith($this->itemId, $this->price);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Domain\Entity\Product');
    }

    function it_should_implement_item()
    {
        $this->shouldImplement('malotor\shoppingcart\Domain\Entity\Item');
    }

    function it_should_has_an_id()
    {
        $this->getId()->shouldReturn($this->itemId);
    }

    function it_should_has_an_initial_quantity_equal_than_1()
    {
        $this->getQuantity()->shouldReturn(1);
    }

    function it_should_increment_its_quantity()
    {
        $this->increaseQuantity();
        $this->getQuantity()->shouldReturn(2);
    }

    function it_should_return_total_amount_of_product()
    {
        $this->getAmount()->shouldReturn($this->price);
        $this->increaseQuantity();
        $this->getAmount()->shouldReturn($this->price * 2);
    }
}
