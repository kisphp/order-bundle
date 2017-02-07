<?php

namespace Kisphp\OrderBundle\Model;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface FactoryModelInterface
{
    /**
     * @return SalesModelInterface
     */
    public function createSalesModel();

    /**
     * @return SalesItemModelInterface
     */
    public function createSalesItemModel();

    /**
     * @return SessionInterface
     */
    public function getSession();
}
