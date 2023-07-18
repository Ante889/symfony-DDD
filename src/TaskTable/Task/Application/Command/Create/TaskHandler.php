<?php

namespace App\TaskTable\Task\Application\Command\Create;

use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask;
use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask\ConfirmTaskService;
use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;
use App\TaskTable\Task\Application\Command\Command;


class TaskHandler
{
    private function __construct(
        private ConfirmTaskService $confirmTaskService
    )
    {
    }

    public function __invoke(Command $command): void
    {
        $task = Task::create(
            TaskId::generate(),
            Category::create(
                $command->getCategoryName()
            ),
            $command->getTaskTime(),
            $command->getTaskLengthInMinutes()
        );

        try {
            $this->confirmTaskService->confirmTask($task);
        } catch (CouldNotConfirmTask $exception) {
            throw new \RuntimeException("The task could not be created");
        }
    }

}