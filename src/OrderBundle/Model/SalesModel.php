<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManager;
use Kisphp\Admin\MainBundle\Entity\ArticlesEntity;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\SalesEntity;
use Symfony\Component\HttpFoundation\Session\Session;

class SalesModel extends AbstractModel
{
    const REPOSITORY = 'OrderBundle:SalesEntity';

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
     * @return SalesEntity
     */
    protected function getCartBySessionId()
    {
        $this->startSession();

        /** @var SalesEntity $order */
        $order = $this->getRepository()->findOneBy([
            'session_id' => $this->session->getId(),
        ]);

        if ($order === null) {
            $order = new SalesEntity();
            $order->setSessionId($this->session->getId());

            $this->save($order);
        }

        return $order;
    }

    public function addProductToCart(ArticlesEntity $product, $quantity)
    {
        $order = $this->getCartBySessionId();
        $order->setSessionId($this->session->getId());

        $orderItemModel = new SalesItemModel($this->em);
        $orderItem = $orderItemModel->createFromProduct($product, $order);

        $orderItem->addQuantity($quantity);

        dump($orderItem);

        dump($order);

        dump($product);
        die;
    }
}
