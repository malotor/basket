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

        $this->basket->getItems()->willReturn([$this->productId => $this->product]);

        $this->basket->totalAmount()->willReturn(10);

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

    function it_should_remove_a_product_from_a_basket()
    {
        $this->basket->removeItem($this->productId)->shouldBeCalled();
        $this->basketRepo->save($this->basket)->shouldBeCalled();
        $this->removeProductFromBasket($this->productId, $this->basketId);
    }

    function it_should_retrieve_all_produts_in_a_basket()
    {
        $this->getProductsFromBasket($this->basketId)->shouldReturn([$this->productId => $this->product]);
    }

    function it_should_retrieve_total_basket_amount()
    {
        $this->getBasketTotalAmount($this->basketId)->shouldReturn(10);
    }
}
