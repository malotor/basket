<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Domain\Entity\Product');
    }
}
