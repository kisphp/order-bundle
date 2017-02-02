<?php

namespace Kisphp\OrderBundle\Cart;

use Kisphp\Admin\MainBundle\Entity\KisphpEntityInterface;

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
     * @param KisphpEntityInterface $product
     * @param int $quantity
     *
     * @return $this
     */
    public function addProduct(KisphpEntityInterface $product, $quantity)
    {
        $this->products[$product->getId()] = $product;
        $this->prices[$product->getId()] = $product->getPrice();

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

    public function getCartItemsCount()
    {
        return count($this->products);
    }
}
