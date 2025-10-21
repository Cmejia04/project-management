<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getTotalRecords(): int
    {
        return $this->createQueryBuilder('user')
            ->select('COUNT(user)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
