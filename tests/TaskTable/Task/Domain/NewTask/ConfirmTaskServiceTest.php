<?php

namespace App\Tests\TaskTable\Task\Domain\NewTask;

use App\TaskTable\Task\Domain\NewTask\Exception\CouldNotConfirmTask\ConfirmTaskService;
use App\TaskTable\Task\Domain\NewTask\Model\Category;
use App\TaskTable\Task\Domain\NewTask\Model\Task;
use App\TaskTable\Task\Domain\NewTask\Model\TaskId;
use App\Tests\TaskTable\Task\Doubles\ImMemoryTaskRepository;
use PHPUnit\Framework\TestCase;

class ConfirmTaskServiceTest extends TestCase
{
    public function task_can_be_confirmed(): void
    {
       $repository = new ImMemoryTaskRepository();

       $service = new ConfirmTaskService($repository);

       $dateTime = new \DateTimeImmutable();

       $task = Task::create(
           TaskId::generate(),
           Category::create('TastCategory'),
           $dateTime,
           15
       );

       $service->confirmTask($task);

       static::assertSame(
           $task,
           $repository->getTaskAtTime($dateTime)
       );
    }
}