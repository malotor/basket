<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{

    private $itemId;

    function let()
    {
        $this->itemId = rand();
        $this->beConstructedWith($this->itemId);
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
}
