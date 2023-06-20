<?php

namespace App\Tests\TaskTable\Task\Domain\NewTask;

use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function test_an_task_can_be_created(): void
    {
        $taskId = TaskId::generate();
        $category = Category::create(
            'firstCategory'
        );
        $startTime = new \DateTimeImmutable();
        $taskLength = 60;

        $task = Task::create(
            $taskId,
            $category,
            $startTime,
            $taskLength
        );

        static::assertSame($taskId, $task->getId());
        static::assertSame($category, $task->getCategory());
        static::assertSame($startTime, $task->getStartTime());
        static::assertSame($taskLength, $task->getLengthInMinutes());
    }
}