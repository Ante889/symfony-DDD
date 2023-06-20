<?php

namespace App\TaskTable\Task\Domain\NewTask\Model;

use App\TaskTable\Task\Domain\NewTask\Exception\TaskLengthInvalid;

class Task
{
    public const MINIMUM_TASK_LENGTH = 15;

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

    /**
     * @param TaskId $taskId
     * @param Category $category
     * @param \DateTimeImmutable $taskTime
     * @param int $taskLengthInMinutes
     * @return self
     */
    public static function create(
        TaskId $taskId,
        Category $category,
        \DateTimeImmutable $taskTime,
        int $taskLengthInMinutes
    ): self
    {
        //cannot be longer than MINIMUM_TASK_LENGTH
        if (self::MINIMUM_TASK_LENGTH > $taskLengthInMinutes) {
            throw new TaskLengthInvalid(
                sprintf("The minimum task length is %s minutes", self::MINIMUM_TASK_LENGTH)
            );
        }

        //cannot be zero or negative number
        if ($taskLengthInMinutes === 0 || $taskLengthInMinutes < 0) {
            throw new TaskLengthInvalid(
                "The task length must be a positive number"
            );
        }

        //clean object
        return new self($taskId, $category, $taskTime, $taskLengthInMinutes);
    }


    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @return TaskId
     */
    public function getId(): TaskId
    {
        return $this->taskId;
    }


    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->taskLengthInMinutes;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getLengthInMinutes(): \DateTimeImmutable
    {
        return $this->taskTime;
    }

}