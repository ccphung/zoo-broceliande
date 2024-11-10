<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Service>
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class);
    }

    public function findByFilter($categoryFilter) 

    {
        $query = $this->createQueryBuilder('s');

        if ($categoryFilter !== null) {
            $query
                ->andWhere('s.category = :category')
                ->setParameter('category', "$categoryFilter");
        }

        return $query->getQuery()->getResult();
    }
}
