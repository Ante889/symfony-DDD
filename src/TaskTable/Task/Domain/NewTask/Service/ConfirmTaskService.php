<?php

namespace App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask;

use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;

class ConfirmTaskService
{

    public function __construct(
        private readonly TaskRepository $taskRepository
    )
    {
    }

    public function confirmTask(Task $task): void
    {
        $this->checkTaskTimingOverlap($task);
        //And more checks....

        $this->taskRepository->store($task);
    }

    public function checkTaskTimingOverlap(Task $task): void
    {
         foreach ($this->taskRepository->getAll() as $taskFromBase) {
            if (
                $taskFromBase->getStartTime() < $task->getStartTime() &&
                (int)$taskFromBase->getStartTime() + Task::MINIMUM_TASK_LENGTH > $task->getStartTime()
            ) {
               throw new CouldNotConfirmTask("Task time must not be overlap with other task");
            }
        }
    }
}