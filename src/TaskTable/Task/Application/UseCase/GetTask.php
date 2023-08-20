<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Application\UseCase;


use App\TaskTable\Task\Application\ReadModel\Query\TaskDTO;
use App\TaskTable\Task\Application\Service\TaskServiceInterface;
use DateTimeImmutable;

final class GetTask
{
    public function __construct(
        private readonly TaskServiceInterface $taskService
    )
    {
    }

    public function fetchAll(): array
    {
        return $this->taskService->fetchAll();
    }

    public function getByTime(DateTimeImmutable $date): ?TaskDTO
    {
        return $this->taskService->getOneByTaskTime($date);
    }
}