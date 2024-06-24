<?php

namespace App\Repository;

use App\Entity\VetReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VetReport>
 */
class VetReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VetReport::class);
    }

    public function findByFilter($filterAnimal, $filterDate)
    {
        $query = $this->createQueryBuilder('v');

        if(!empty($filterAnimal)) {
            $query
                ->andWhere('v.animal IN (:animals)')
                ->setParameter(':animals', array_values($filterAnimal));
        }

        if ($filterDate === "asc") {
            $query
                ->orderBy('v.visitDate', "ASC");
        } elseif ($filterDate === "desc") {
            $query
                ->orderBy('v.visitDate', "DESC");
        }

        return $query->getQuery()->getResult();
    }
}
