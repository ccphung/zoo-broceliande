<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    public function findUnapprovedReviewsCount(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->andWhere('r.isVisible = :unapproved')
            ->setParameter('unapproved', false)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findLastApproved(): ?Review
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.isVisible = :approved')
            ->setParameter('approved', true)
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
