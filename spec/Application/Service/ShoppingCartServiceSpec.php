<?php

namespace spec\malotor\shoppingcart\Application\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use malotor\shoppingcart\Domain\Entity\Basket;
use malotor\shoppingcart\Domain\Entity\Product;

use malotor\shoppingcart\Application\Repository\ProductRepository;
use malotor\shoppingcart\Application\Repository\BasketRepository;

class ShoppingCartServiceSpec extends ObjectBehavior
{

    private $productRepo;
    private $basketRepo;
    private $product;
    private $basket;
    private $productId;
    private $basketId;

    function let(
        Basket $basket,
        Product $product,
        ProductRepository $productRepo,
        BasketRepository $basketRepo
    )
    {

        $this->product = $product;
        $this->basket = $basket;

        $this->productRepo = $productRepo;
        $this->basketRepo = $basketRepo;

        $this->beConstructedWith($this->productRepo, $this->basketRepo);
        $this->productId = rand();
        $this->basketId = rand();

        $this->productRepo->get($this->productId)->willReturn($this->product);
        $this->basketRepo->get($this->basketId)->willReturn($this->basket);

    }

    function it_is_initializable()
    {
        $this->shouldHaveType('malotor\shoppingcart\Application\Service\ShoppingCartService');
    }

    function it_should_add_a_product_to_a_basket()
    {
        $this->basket->addItem($this->product)->shouldBeCalled();
        $this->basketRepo->save($this->basket)->shouldBeCalled();

        $this->addProductToBasket($this->productId, $this->basketId);
    }
}
