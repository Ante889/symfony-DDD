<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Infrastructure\Doctrine\Repository;

use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;
use App\TaskTable\Task\Infrastructure\Doctrine\Entity\TaskEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;

final class DoctrineTaskRepository extends ServiceEntityRepository implements TaskRepository
{
    private const DATE_FORMAT = "Y-m-d\TH:i";
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskEntity::class);
    }

    public function save(TaskEntity $task): void
    {
        $this->_em->persist($task);
        $this->_em->flush();
    }

    public function getTaskAtTime(\DateTimeImmutable $taskTime): ?Task
    {
        $data = $this->findBy(['taskTime' => $taskTime]);

        if (empty($data)) {
           return null;
        }

        return $this->getOne($data);
    }

    public function store(Task $task): void
    {
        $taskEntity = (new TaskEntity())
                    ->setId((int) $task->getId())
                    ->setDescription($task->getDescription())
                    ->setTaskLengthInMinutes($task->getLengthInMinutes())
                    ->setTaskTime((new \DateTime())->setTimestamp($task->getStartTime()->getTimestamp()));

        $this->save($taskEntity);
    }

    public function getAll(): array
    {
        return $this->getArray(
            $this->findAll()
        );
    }


    public function getOne(array $data): Task
    {
        return Task::create(
            TaskId::fromString($data[0]->getId()),
            Category::create($data[0]->getCategory()->getName()),
            \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $data[0]->getTaskTime()),
            $data[0]->getTaskLengthInMinutes(),
            $data[0]->getDescription()
        );
    }

    public function getArray(array|null $data): array
    {
        return \array_map(function (array $row) {
            return Task::create(
                TaskId::fromString($row->getId()),
                Category::create(
                    $row->getCategory(),
                ),
                \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $row->getTaskTime()),
                $row->getTaskLengthInMinutes(),
                $row->getDescription(),
            );
        }, $data);
    }
}