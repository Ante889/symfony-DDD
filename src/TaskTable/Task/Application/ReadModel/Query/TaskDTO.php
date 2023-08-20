<?php

namespace App\TaskTable\Task\Application\ReadModel\Query;

use DateTimeImmutable;

class TaskDTO
{
    public function __construct(
        private readonly string            $description,
        private readonly string            $categoryName,
        private readonly DateTimeImmutable $taskTime,
        private readonly int               $taskLengthInMinutes
    )
    {
    }

    public function create(
        string $description,
        string $categoryName,
        DateTimeImmutable $taskTime,
        int $taskLengthInMinutes
    ): self
    {
        return new self($description,$categoryName, $taskTime, $taskLengthInMinutes);
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
     * @return DateTimeImmutable
     */
    public function getTaskTime(): DateTimeImmutable
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