<?php

namespace App\TaskTable\Task\Domain\NewTask;

class Category
{
    private function __construct(
        private string $name,
    ) {
    }

    public static function create(
        string $name
    ): Category
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }
}