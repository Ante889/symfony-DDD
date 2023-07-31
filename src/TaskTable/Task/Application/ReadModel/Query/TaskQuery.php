<?php

namespace App\TaskTable\Task\Application\ReadModel\Query;

use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;

class TaskQuery
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function fetchAll(): array
    {
        return \array_map(function (Task $task) {
            return new TaskDTO(
                $task->getDescription(),
                $task->getCategory()->getName(),
                $task->getStartTime(),
                !(15 == $task->getLengthInMinutes()),

            );
        }, $this->taskRepository->getAll());
    }
}
