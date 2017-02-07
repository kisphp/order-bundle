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
    /**
     * @var FactoryModelInterface
     */
    protected $factory;

    /**
     * @param EntityManager $em
     * @param FactoryModelInterface $factoryModel
     */
    public function __construct(EntityManager $em, FactoryModelInterface $factoryModel)
    {
        parent::__construct($em);

        $this->factory = $factoryModel;
    }

    /**
     * @return SalesEntityInterface
     */
    protected function getCartBySessionId()
    {
        /** @var SalesEntityInterface $order */
        $order = $this->getRepository()->findOneBy([
            'session_id' => $this->factory->getSession()->getId(),
        ]);

        if ($order === null) {
            $order = new SalesEntity();

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

        $orderItemModel = $this->factory->createSalesItemModel();
        $orderItem = $orderItemModel->createFromProduct($product, $order);

        $orderItem->addQuantity($quantity);

        dump($orderItem);

        dump($order);

        dump($product);
        die;
    }
}
