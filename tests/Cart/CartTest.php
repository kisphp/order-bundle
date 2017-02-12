<?php

namespace tests\Cart;

use Kisphp\OrderBundle\Cart\Cart;
use Kisphp\OrderBundle\Entity\SalesItemEntity;
use tests\Cart\Data\ProductEntity;
use tests\Cart\Data\ProductImageEntity;

class CartTest extends \PHPUnit_Framework_TestCase
{
    public function test_add_new_product()
    {
        $cart = new Cart();
        $product = $this->createProduct();

        $cart->addProduct($product, 1);

        $this->assertEquals(200, $cart->getTotalPrice(), 'Cart total value should be 200');
        $this->assertEquals(1, $cart->getCartItemsCount(), 'You should have only one distinct product in cart');
    }

    public function test_add_existing_product()
    {
        $cart = new Cart();
        $product = $this->createProduct();

        $cart->addProduct($product, 1);
        $this->assertEquals(200, $cart->getTotalPrice(), 'Cart total value should be 200');
        $this->assertEquals(1, $cart->getQuantity(1), 'You should have quantity = 1 for this product');

        $cart->addProduct($product, 2);
        $this->assertEquals(600, $cart->getTotalPrice(), 'Cart total value should be 600');
        $this->assertEquals(3, $cart->getQuantity(1), 'You should have quantity = 3 for this product');

        $this->assertEquals(1, $cart->getCartItemsCount(), 'You should have only one distinct product in cart');
    }

    public function test_subtract_existing_product()
    {
        $cart = new Cart();
        $product = $this->createProduct();

        $cart->addProduct($product, 3);
        $this->assertEquals(600, $cart->getTotalPrice(), 'Cart total value should be 600');
        $this->assertEquals(3, $cart->getQuantity(1), 'You should have quantity = 3 for this product');

        $cart->substractQuantity($product, 1);
        $this->assertEquals(400, $cart->getTotalPrice(), 'Cart total value should be 600');
        $this->assertEquals(2, $cart->getQuantity(1), 'You should have quantity = 3 for this product');

        $this->assertEquals(1, $cart->getCartItemsCount(), 'You should have only one distinct product in cart');
        $this->assertEquals(1, count($cart->getProducts()), 'You should have only one distinct product in cart');
    }

    public function test_remove_product_from_cart_by_subtracting()
    {
        $cart = new Cart();
        $product = $this->createProduct();

        $cart->addProduct($product, 3);
        $this->assertEquals(600, $cart->getTotalPrice(), 'Cart total value should be 600');
        $this->assertEquals(3, $cart->getQuantity(1), 'You should have quantity = 3 for this product');

        $cart->substractQuantity($product, 3);
        $this->assertEquals(0, $cart->getTotalPrice(), 'Cart total value should be 0');
        $this->assertEquals(0, $cart->getQuantity(1), 'You should have quantity = 0 for this product');

        $this->assertEquals(0, $cart->getCartItemsCount(), 'It shouldn\'t be any product in cart');

        $this->assertEquals(0, count($cart->getProducts()), 'It shouldn\'t be any product in cart');
    }

    public function test_clear_cart()
    {
        $cart = new Cart();
        $product = $this->createProduct();

        $cart->addProduct($product, 3);
        $this->assertEquals(600, $cart->getTotalPrice(), 'Cart total value should be 600');
        $this->assertEquals(3, $cart->getQuantity(1), 'You should have quantity = 3 for this product');

        $cart->clearCart();

        $this->assertEquals(0, $cart->getTotalPrice(), 'Cart total value should be 0');
        $this->assertEquals(0, $cart->getQuantity(1), 'You should have quantity = 0 for this product');

        $this->assertEquals(0, $cart->getCartItemsCount(), 'It shouldn\'t be any product in cart');
        $this->assertEquals(0, count($cart->getProducts()), 'It shouldn\'t be any product in cart');
    }

    public function testCreateCartFromOrderSales()
    {
        $product = new SalesItemEntity();
        $product->setIdOrder(1);
        $product->setId(1);
        $product->setProductPrice(120);
        $product->setQuantity(2);

        $cart = new Cart();
        $cart->addProductFromSales($product);

        $this->assertEquals(240, $cart->getTotalPrice(), 'Cart total value should be 240');
        $this->assertEquals(2, $cart->getQuantity(1), 'You should have quantity = 2 for this product');
    }

    protected function createProduct()
    {
        $product = new ProductEntity();
        $product->setId(1);
        $product->setPrice(200);

        $productImage = new ProductImageEntity();
        $productImage->setId(1);
        $productImage->setFilename('demo.jpg');

        $product->addImage($productImage);

        return $product;
    }
}
