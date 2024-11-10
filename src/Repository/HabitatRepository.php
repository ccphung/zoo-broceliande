<?php

namespace App\Repository;

use App\Entity\Habitat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Habitat>
 */
class HabitatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Habitat::class);
    }

   /**
    * @return Habitat[] Returns an array of Habitat objects
    */
   public function findLastFour(): array
   {
        return $this->createQueryBuilder('h')
        ->orderBy('h.id', 'DESC')
        ->setMaxResults(4)
        ->getQuery()
        ->getResult();
    }

//    public function findOneBySomeField($value): ?Habitat
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
