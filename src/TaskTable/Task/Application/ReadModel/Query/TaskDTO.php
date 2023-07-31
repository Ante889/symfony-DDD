<?php

namespace App\TaskTable\Task\Application\ReadModel\Query;

class TaskDTO
{
    public function __construct(
        private readonly string $description,
        private readonly string $categoryName,
        private readonly int    $taskTime,
        private readonly int    $taskLengthInMinutes
    )
    {
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @return int
     */
    public function getTaskTime(): int
    {
        return $this->taskTime;
    }

    /**
     * @return int
     */
    public function getTaskLengthInMinutes(): int
    {
        return $this->taskLengthInMinutes;
    }
}