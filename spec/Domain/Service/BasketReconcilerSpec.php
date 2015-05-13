<?php

namespace spec\malotor\shoppingcart\Domain\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use malotor\shoppingcart\Domain\Entity\Basket;
use malotor\shoppingcart\Domain\Entity\Item;
use malotor\shoppingcart\Domain\Service\ItemReconciler;


class BasketReconcilerSpec extends ObjectBehavior
{
	function let(ItemReconciler $itemReconciler)
	{
		$this->beConstructedWith($itemReconciler);
	}
    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Domain\Service\BasketReconciler');
    }

    function it_new_basket_should_return_total_amount_0(Basket $basket ) {
    	$basket->getItems()->willReturn(array());
		$this->totalAmount($basket)->shouldReturn(0);
	}

	
	function it_should_return_a_total_amount_eq_sum_of_items_amount(Basket $basket, Item $item, ItemReconciler $itemReconciler) {
		$products = array($item);
		$basket->getItems()->willReturn($products);
		$itemReconciler->getAmount($item)->shouldBeCalled()->willReturn(10);
		$this->totalAmount($basket)->shouldReturn(10);
	}
	
}
