<?php

namespace malotor\shoppingcart\Application\Service;

use malotor\shoppingcart\Application\Repository\ProductRepository;
use malotor\shoppingcart\Application\Repository\BasketRepository;

class ShoppingCartService
{

    private $productRepository;
    private $basketRepository;

    public function __construct(ProductRepository $productRepository, BasketRepository  $basketRepository)
    {
        $this->productRepository = $productRepository;
        $this->basketRepository = $basketRepository;

    }
    public function addProductToBasket($productId, $baskedId)
    {
        $basket = $this->basketRepository->get($baskedId);
        $product = $this->productRepository->get($productId);

        $basket->addItem($product);

        $this->basketRepository->save($basket);

    }

}
