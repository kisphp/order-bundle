<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManager;
use Kisphp\Admin\MainBundle\Entity\ArticlesEntity;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\OrderEntity;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderModel extends AbstractModel
{
    const REPOSITORY = 'OrderBundle:OrderEntity';

    /**
     * @var Session
     */
    protected $session;

    /**
     * @param EntityManager $entityManager
     * @param Session $session
     */
    public function __construct(EntityManager $entityManager, Session $session)
    {
        parent::__construct($entityManager);

        $this->session = $session;

        $this->startSession();
    }

    protected function startSession()
    {
        if ($this->session->isStarted() === false) {
            $this->session->start();
        }
    }

    /**
     * @return OrderEntity
     */
    protected function getCartBySessionId()
    {
        $this->startSession();

        /** @var OrderEntity $order */
        $order = $this->getRepository()->findOneBy([
            'session_id' => $this->session->getId(),
        ]);

        if ($order === null) {
            $order = new OrderEntity();
            $order->setSessionId($this->session->getId());

            $this->save($order);
        }

        return $order;
    }

    public function addProductToCart(ArticlesEntity $product, $quantity)
    {
        $order = $this->getCartBySessionId();
        $order->setSessionId($this->session->getId());

        $orderItemModel = new OrderItemModel($this->em);
        $orderItem = $orderItemModel->createFromProduct($product, $order);

        $orderItem->addQuantity($quantity);


        dump($orderItem);


        dump($order);

        dump($product);
        die;
    }
}
