<?php

namespace App\TaskTable\Task\Application\Command\Create;

use App\TaskTable\Task\Application\Command\Command;

class TaskCommand implements Command
{
    private function __construct(
        private string $description,
        private string $categoryName,
        private \DateTimeImmutable $taskTime,
        private int $taskLengthInMinutes
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