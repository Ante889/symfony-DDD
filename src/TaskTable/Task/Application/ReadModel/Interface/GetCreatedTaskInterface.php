<?php declare(strict_types=1);

namespace App\TaskTable\Task\Application\ReadModel\Interface;

use DateTimeImmutable;

interface GetCreatedTaskInterface
{
    public function getCategoryName(): ?string;

    public function getTaskTime(): DateTimeImmutable;

    public function getTaskLengthInMinutes(): int;
}