<?php declare(strict_types=1);

namespace App\TaskTable\Task\Application\Command;

use DateTimeImmutable;

interface Command
{
    public function getCategoryName(): ?string;

    public function getTaskTime(): DateTimeImmutable;

    public function getTaskLengthInMinutes(): int;
}