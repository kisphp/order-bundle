<?php

namespace Kisphp\OrderBundle\Cart;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartFactory
{
    const CART_SESSION_NAME = 'cart';

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if ($this->session->isStarted() === false) {
            $this->session->start();
        }

        return $this->createCart();
    }

    /**
     * @return Cart
     */
    protected function createCart()
    {
        if ($this->session->has(static::CART_SESSION_NAME) === false) {
            $this->session->set(static::CART_SESSION_NAME, $this->createCartObject());
        }

        return $this->session->get(static::CART_SESSION_NAME);
    }

    /**
     * @return Cart
     */
    protected function createCartObject()
    {
        return new Cart();
    }
}
