<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManager;
use Kisphp\Admin\MainBundle\Entity\ArticlesEntity;
use Kisphp\Entity\KisphpEntityInterface;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\SalesEntity;
use Kisphp\OrderBundle\Entity\SalesEntityInterface;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class SalesModel extends AbstractModel implements SalesModelInterface
{
    protected $factory;

    public function __construct(EntityManager $em, Fa)
    {
        parent::__construct($em);
    }


    /**
     * @return SalesEntityInterface
     */
    protected function getCartBySessionId()
    {
        /** @var SalesEntityInterface $order */
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

    public function getSalesList()
    {
        return $this->getRepository()->findAll();
    }

    public function addProductToCart(KisphpEntityInterface $product, $quantity)
    {
        $order = $this->getCartBySessionId();

        $orderItemModel = new SalesItemModel($this->em);
        $orderItem = $orderItemModel->createFromProduct($product, $order);

        $orderItem->addQuantity($quantity);

        dump($orderItem);

        dump($order);

        dump($product);
        die;
    }
}
