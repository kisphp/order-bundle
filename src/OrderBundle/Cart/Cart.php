<?php

namespace Kisphp\OrderBundle\Cart;

use Kisphp\Entity\KisphpEntityInterface;

class Cart
{
    /**
     * @var KisphpEntityInterface[]
     */
    protected $products = [];

    /**
     * @var array
     */
    protected $quantities = [];

    /**
     * @var array
     */
    protected $prices = [];

    /**
     * @var array
     */
    protected $images = [];

    /**
     * @param KisphpEntityInterface $product
     * @param int $quantity
     *
     * @return $this
     */
    public function addProduct(KisphpEntityInterface $product, $quantity)
    {
        $this->products[$product->getId()] = $product;
        $this->prices[$product->getId()] = $product->getPrice();

        foreach ($product->getImages() as $image) {
            $this->images[$product->getId()][$image->getId()] = $image;
        }

        $this->addQuantity($product, $quantity);

        return $this;
    }

    /**
     * @param KisphpEntityInterface $product
     * @param int $quantity
     *
     * @return $this
     */
    public function addQuantity(KisphpEntityInterface $product, $quantity)
    {
        if (!isset($this->quantities[$product->getId()])) {
            $this->quantities[$product->getId()] = $quantity;

            return $this;
        }
        $this->quantities[$product->getId()] += $quantity;

        return $this;
    }

    /**
     * @param KisphpEntityInterface $product
     * @param int $quantity
     *
     * @return $this
     */
    public function substractQuantity(KisphpEntityInterface $product, $quantity)
    {
        $this->quantities[$product->getId()] -= $quantity;

        if ($this->quantities[$product->getId()] < 1) {
            $this->removeProduct($product);
        }

        return $this;
    }

    /**
     * @param KisphpEntityInterface $product
     *
     * @return $this
     */
    public function removeProduct(KisphpEntityInterface $product)
    {
        unset($this->products[$product->getId()]);
        unset($this->quantities[$product->getId()]);
        unset($this->prices[$product->getId()]);
        unset($this->images[$product->getId()]);

        return $this;
    }

    /**
     * @return $this
     */
    public function clearCart()
    {
        $this->products = [];
        $this->quantities = [];
        $this->prices = [];
        $this->images = [];

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->prices as $idProduct => $price) {
            $total += $price * $this->quantities[$idProduct];
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getCartItemsCount()
    {
        return count($this->products);
    }

    /**
     * @return KisphpEntityInterface[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param int $productId
     *
     * @return int
     */
    public function getQuantity($productId)
    {
        if (!isset($this->quantities[$productId])) {
            return 0;
        }

        return $this->quantities[$productId];
    }
}
