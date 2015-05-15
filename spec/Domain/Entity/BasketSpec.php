<?php

namespace spec\malotor\shoppingcart\Domain\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use malotor\shoppingcart\Domain\Entity\Item;
use malotor\shoppingcart\Domain\ValueObject\Identifier;

class BasketSpec extends ObjectBehavior
{
	private $item;
	private $itemId;

	function let(Item $item) {
		$this->item = $item;
		$this->itemId = rand();
	    $this->item->getAmount()->willReturn(10);
    	$this->item->getId()->willReturn($this->itemId);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Domain\Entity\Basket');
    }

    function it_new_basket_should_have_0_items()
    {
    	$this->countItems()->shouldReturn(0);
    }

    function it_should_have_1_item_when_a_new_item_is_added()
    {
    	$this->addItem($this->item);
		$this->countItems()->shouldReturn(1);
	}

	function it_should_retrieve_an_item(Item $item)
	{
		$this->addItem($this->item);
		$this->getItem($this->itemId)->shouldReturn($this->item);
	}

	function it_should_remove_an_item(Item $item)
	{
		$this->addItem($this->item);
		$this->countItems()->shouldReturn(1);
		$this->removeItem($this->itemId);
		$this->countItems()->shouldReturn(0);
	}

	function it_should_increment_the_item_quantity()
	{
		$this->addItem($this->item);
		$this->item->increaseQuantity()->shouldBeCalled();
		$this->addItem($this->item);
	}

	function it_new_basket_should_return_total_amount_0() {
		$this->totalAmount()->shouldReturn(0);
    }

    function it_total_amount_of_basket_should_be_equal_the_amount_of_the_items()
    {
        $this->addItem($this->item);
        $this->totalAmount()->shouldReturn(10);
    }

    function it_should_return_all_items_in_the_basket()
    {
    	$this->addItem($this->item);
    	$this->getItems()->shouldReturn([$this->itemId => $this->item]);
    }
}
