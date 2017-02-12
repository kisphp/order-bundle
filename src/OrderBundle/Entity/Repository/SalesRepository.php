<?php

namespace Kisphp\OrderBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class SalesRepository extends EntityRepository
{
    public function getQuerySalesBySearchTerm($searchTerm)
    {
        $query = $this->createQueryBuilder('a')
//            ->andWhere('a.status > :status')
            ->orderBy('a.id', 'DESC')
//            ->setParameter('status', Status::DELETED)
        ;

//        $this->filterQueryBySearchTerm($query, $searchTerm);

        return $query;
    }
}
