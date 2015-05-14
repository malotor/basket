<?php

namespace spec\malotor\shoppingcart\Application\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ShoppingCartServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Application\Service\ShoppingCartService');
    }
}
