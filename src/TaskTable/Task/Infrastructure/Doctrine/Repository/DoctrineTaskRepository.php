<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Infrastructure\Doctrine\Repository;

use App\TaskTable\Task\Infrastructure\Doctrine\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;

final class DoctrineTaskRepository extends ServiceEntityRepository implements TaskRepository
{
    private const DATE_FORMAT = "Y-m-d\TH:i";
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function save(Task $task): void
    {
        $this->_em->persist($task);
        $this->_em->flush();
    }

    public function getTaskAtTime(\DateTimeImmutable $taskTime): ?\App\TaskTable\Task\Domain\NewTask\Model\Task
    {
        // TODO: Implement getTaskAtTime() method.
    }

    public function store(\App\TaskTable\Task\Domain\NewTask\Model\Task $task): void
    {
        // TODO: Implement store() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}