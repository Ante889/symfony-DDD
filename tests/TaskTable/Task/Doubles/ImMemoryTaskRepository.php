<?php

namespace App\Tests\TaskTable\Task\Doubles;

use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Repository\TaskRepository;

class ImMemoryTaskRepository implements TaskRepository
{
    private array $tasks = [];

    public function getTaskAtTime(\DateTimeImmutable $taskTime): ?Task
    {
        // commented for now
    }

    public function store(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function getAll(): array
    {
        return $this->tasks;
    }
}
