<?php

namespace App\TaskTable\Task\Application\Command\Create;

use App\TaskTable\Task\Application\ReadModel\Interface\GetCreatedTaskInterface;

final class TaskCommand implements GetCreatedTaskInterface
{
    private function __construct(
        private readonly string             $description,
        private readonly string             $categoryName,
        private readonly \DateTimeImmutable $taskTime,
        private readonly int                $taskLengthInMinutes
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
     * @return \DateTimeImmutable
     */
    public function getTaskTime(): \DateTimeImmutable
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