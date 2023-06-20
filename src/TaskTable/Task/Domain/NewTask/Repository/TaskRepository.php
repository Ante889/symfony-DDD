<?php

namespace App\TaskTable\Task\Domain\NewTask\Repository;

use App\TaskTable\Task\Domain\NewTask\Model\Task;

interface TaskRepository
{
    public function getTaskAtTime(\DateTimeImmutable $taskTime): ?Task;

    public function store(Task $task): void;

    /**
     * @return Task[]
     */
    public function getAll(): array;
}
