<?php

namespace Kisphp\OrderBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class SalesRepository extends EntityRepository
{
    /**
     * @param string $searchTerm
     *
     * @return QueryBuilder
     */
    public function getQuerySalesBySearchTerm($searchTerm)
    {
        $query = $this->createQueryBuilder('a')
            ->orderBy('a.id', 'DESC')
        ;

        $this->filterQueryBySearchTerm($query, $searchTerm);

        return $query;
    }

    /**
     * @param QueryBuilder $query
     * @param string|null $searchTerm
     *
     * @return $this
     */
    protected function filterQueryBySearchTerm(QueryBuilder $query, $searchTerm = null)
    {
        if ($searchTerm !== null && (int) $searchTerm > 0 && $searchTerm == (int) $searchTerm) {
            $query->andWhere('a.id = :id')
                ->setParameter('id', $searchTerm)
            ;

            return $this;
        }

        if ($searchTerm !== null) {
            $whereCondition = 'a.customer_email LIKE :query 
            OR a.customer_name LIKE :query 
            OR a.customer_address LIKE :query
            OR a.customer_country LIKE :query
            OR a.customer_city LIKE :query
            ';
            $query->andWhere($whereCondition)
                ->setParameter('query', '%' . $searchTerm . '%')
            ;
        }

        return $this;
    }
}
