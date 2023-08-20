<?php

namespace App\TaskTable\Infrastructure\Service;

use App\TaskTable\Task\Application\ReadModel\Query\TaskDTO;
use App\TaskTable\Task\Application\Service\TaskServiceInterface;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;
use DateTimeImmutable;

class TaskService implements TaskServiceInterface
{

    public function __construct(
        private readonly TaskRepository $taskRepository
    )
    {
    }

    public function fetchAll(): array
    {
        return \array_map(function (Task $task) {
            return new TaskDTO(
                $task->getDescription(),
                $task->getCategory()->getName(),
                $task->getStartTime(),
                !(15 == $task->getLengthInMinutes())
            );
        }, $this->taskRepository->getAll());
    }

    public function getOneByTaskTime(DateTimeImmutable $date): ?TaskDTO
    {
        $task = $this->taskRepository->getTaskAtTime($date);

        // Some checks or some logic

        return new TaskDTO(
            $task->getDescription(),
            $task->getCategory()->getName(),
            $task->getStartTime(),
            !(15 == $task->getLengthInMinutes())
        );
    }

}