<?php

namespace Kisphp\OrderBundle\Cart;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartFactory
{
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
        if ($this->session->has('cart') === false) {
            $this->session->set('cart', $this->createCartObject());
        }

        return $this->session->get('cart');
    }

    /**
     * @return Cart
     */
    protected function createCartObject()
    {
        return new Cart();
    }
}
