<?php

namespace App\TaskTable\Task\Application\ReadModel\GetCreatedTaskQuery;

use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask;
use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask\ConfirmTaskService;
use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;
use App\TaskTable\Task\Application\ReadModel\Interface\GetCreatedTaskInterface;


class GetCreatedTaskQuery
{
    private function __construct(
        private readonly ConfirmTaskService $confirmTaskService
    )
    {
    }

    public function __invoke(GetCreatedTaskInterface $getCreatedTask): void
    {
        $task = Task::create(
            TaskId::generate(),
            Category::create(
                $getCreatedTask->getCategoryName()
            ),
            $getCreatedTask->getTaskTime(),
            $getCreatedTask->getTaskLengthInMinutes()
        );

        try {
            $this->confirmTaskService->confirmTask($task);
        } catch (CouldNotConfirmTask $exception) {
            throw new \RuntimeException("The task could not be created");
        }
    }

}