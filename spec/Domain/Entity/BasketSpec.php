<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use malotor\shoppingcart\Domain\Entity\Item;
use malotor\shoppingcart\Domain\ValueObject\Identifier;

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

    function it_should_have_1_item_when_a_new_item_is_added(Item $item) {
    	$this->addItem($item);
		$this->countItems()->shouldReturn(1);
	}

	function it_should_retrieve_an_item(Item $item) {
		$itemId = rand();
		$item->getId()->willReturn($itemId);
		$this->addItem($item);
		$this->getItem($itemId)->shouldReturn($item);
	}

	function it_should_remove_an_item(Item $item) {
		$itemId = rand();
		$item->getId()->willReturn($itemId);
		$this->addItem($item);
		$this->countItems()->shouldReturn(1);
		$this->removeItem($itemId);
		$this->countItems()->shouldReturn(0);
	}
}
