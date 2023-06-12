<?php

namespace App\TaskTable\Task\Domain\NewTask;

use App\TaskTable\Task\Domain\NewTask\Exception\TaskLengthInvalid;

class Task
{
    private const MINIMUM_TASK_LENGTH = 15;

    private function __construct(
        TaskId $taskId,
        Category $category,
        \DateTimeImmutable $taskTime,
        int $taskLengthInMinutes
    )
    {
        $this->taskId = $taskId;
        $this->category = $category;
        $this->taskTime = $taskTime;
        $this->taskLengthInMinutes = $taskLengthInMinutes;
    }

    public static function create(
        TaskId $taskId,
        Category $category,
        \DateTimeImmutable $taskTime,
        int $taskLengthInMinutes
    ): self
    {
        if (self::MINIMUM_TASK_LENGTH > $taskLengthInMinutes) {
            throw new TaskLengthInvalid(
                sprintf("The minimum task length is %s minutes", self::MINIMUM_TASK_LENGTH)
            );
        }

        if ($taskLengthInMinutes === 0 || $taskLengthInMinutes < 0) {
            throw new TaskLengthInvalid(
                "The task length must be a positive number"
            );
        }

        return new self($taskId, $category, $taskTime, $taskLengthInMinutes);
    }

}