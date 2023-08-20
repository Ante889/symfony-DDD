<?php

namespace App\TaskTable\Task\Application\Service;

use App\TaskTable\Task\Application\ReadModel\Query\TaskDTO;
use DateTimeImmutable;

interface TaskServiceInterface
{
    public function fetchAll(): ?array;

    public function getOneByTaskTime(DateTimeImmutable $date): ?TaskDTO;
}
