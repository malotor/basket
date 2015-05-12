<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Domain\Entity\Basket');
    }

    function it_new_basket_should_have_0_items()
    {
    	$this->countItems()->shouldReturn(0);
    }
}
