<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManagerInterface;

abstract class FactoryModel implements FactoryModelInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
}
