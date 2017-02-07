<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManager;

abstract class FactoryModel
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return SalesModelInterface
     */
    abstract public function createSalesModel();

    /**
     * @return SalesItemModelInterface
     */
    abstract public function createSalesItemModel();
}
