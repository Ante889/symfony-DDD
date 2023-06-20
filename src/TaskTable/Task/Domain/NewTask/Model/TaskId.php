<?php

namespace App\TaskTable\Task\Domain\NewTask\Model;

use Symfony\Component\Uid\Uuid;

class TaskId
{
    private function __construct(
        private string $id
    )
    {
    }

    public static function generate(): self
    {
        return new self(Uuid::v4());
    }

    public static function fromString(string $id): self
    {
        if (false === Uuid::isValid($id)) {
            throw new \DomainException(
                \sprintf("TaskId '%s' is not valid", $id)
            );
        }

        return new self($id);
    }

    public function toString(): string
    {
        return $this->id;
    }
}