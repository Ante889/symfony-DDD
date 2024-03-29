<?php

namespace App\TaskTable\Task\Domain\NewTask\Model;

use App\TaskTable\Task\Domain\NewTask\Exception\TaskLengthInvalid;
use DateTimeImmutable;

class Task
{
    public const MINIMUM_TASK_LENGTH = 15;

    private function __construct(
        TaskId $taskId,
        string $description,
        Category $category,
        DateTimeImmutable $taskTime,
        string $taskLengthInMinutes
    )
    {
        $this->taskId = $taskId;
        $this->description = $description;
        $this->category = $category;
        $this->taskTime = $taskTime;
        $this->taskLengthInMinutes = $taskLengthInMinutes;
    }

    /**
     * @param TaskId $taskId
     * @param Category $category
     * @param DateTimeImmutable $taskTime
     * @param int $taskLengthInMinutes
     * @param string $description
     * @return self
     */
    public static function create(
        TaskId $taskId,
        Category $category,
        DateTimeImmutable $taskTime,
        int $taskLengthInMinutes,
        string $description = ''
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
        return new self($taskId, $description, $category, $taskTime, $taskLengthInMinutes);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     * @return DateTimeImmutable
     */
    public function getStartTime(): DateTimeImmutable
    {
        return $this->taskTime;
    }

    /**
     * @return string
     */
    public function getLengthInMinutes(): string
    {
        return $this->taskLengthInMinutes;
    }

}