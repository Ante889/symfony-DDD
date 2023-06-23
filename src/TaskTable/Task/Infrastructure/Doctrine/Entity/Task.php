<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Infrastructure\Doctrine\Entity;

use App\TaskTable\Category\Infrastructure\Doctrine\Entity\Category;
use App\TaskTable\Task\Infrastructure\Doctrine\Repository\DoctrineTaskRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(
    repositoryClass: DoctrineTaskRepository::class
)]
#[ORM\Table(
    name: 'task'
)]
final class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: 'integer'
    )]
    private int $id;

    #[ORM\Column(
        name: 'description',
        type: 'string'
    )]
    #[Assert\NotBlank(
        groups: ['action']
    )]
    private string $description;

    #[ORM\Column(
        name: 'task_time',
        type: 'datetime',
        nullable: true
    )]
    #[Assert\NotBlank(
        groups: ['action']
    )]
    private ?DateTime $taskTime;

    #[ORM\Column(
        name: 'task_length_in_minutes',
        type: 'string'
    )]
    private string $taskLengthInMinutes;

    #[ORM\ManyToOne(
        targetEntity: Category::class,
        cascade: ['persist']
    )]
    #[ORM\JoinColumn(
        name: 'category'
    )]
    private ?Category $category = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime|null
     */
    public function getTaskTime(): ?DateTime
    {
        return $this->taskTime;
    }

    /**
     * @param DateTime|null $taskTime
     */
    public function setTaskTime(?DateTime $taskTime): void
    {
        $this->taskTime = $taskTime;
    }

    /**
     * @return string
     */
    public function getTaskLengthInMinutes(): string
    {
        return $this->taskLengthInMinutes;
    }

    /**
     * @param string $taskLengthInMinutes
     */
    public function setTaskLengthInMinutes(string $taskLengthInMinutes): void
    {
        $this->taskLengthInMinutes = $taskLengthInMinutes;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     */
    public function setCategory(?Category $category): void
    {
        $this->category = $category;
    }
}