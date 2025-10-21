<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function getTotalRecords(): int
    {
        return $this->createQueryBuilder('task')
            ->select('COUNT(task.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
