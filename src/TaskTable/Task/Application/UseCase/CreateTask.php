<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Application\UseCase;

use App\TaskTable\Task\Application\ReadModel\Query\TaskDTO;
use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask;
use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask\ConfirmTaskService;
use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;

final class CreateTask
{
    public function __construct(
        private readonly ConfirmTaskService $confirmTaskService
    )
    {
    }

    public function create(TaskDTO $taskDTO): void
    {
        $task = Task::create(
            TaskId::generate(),
            Category::create(
                $taskDTO->getCategoryName()
            ),
            $taskDTO->getTaskTime(),
            $taskDTO->getTaskLengthInMinutes()
        );

        try {
            $this->confirmTaskService->confirmTask($task);
        } catch (CouldNotConfirmTask $exception) {
            throw new \RuntimeException("The task could not be created");
        }
    }
}