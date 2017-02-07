<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManager;

abstract class FactoryModel implements FactoryModelInterface
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
}
