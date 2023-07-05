<?php

declare(strict_types=1);

namespace App\TaskTable\Category\Infrastructure\Doctrine\Repository;

use App\TaskTable\Category\Infrastructure\Doctrine\Entity\CategoryEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineCategoryRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryEntity::class);
    }

    public function save(CategoryEntity $score): void
    {
        $this->_em->persist($score);
        $this->_em->flush();
    }
}