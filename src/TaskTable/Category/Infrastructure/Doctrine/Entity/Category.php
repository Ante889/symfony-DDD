<?php

declare(strict_types=1);

namespace App\TaskTable\Category\Infrastructure\Doctrine\Entity;

use App\TaskTable\Category\Infrastructure\Doctrine\Repository\DoctrineCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(
    repositoryClass: DoctrineCategoryRepository::class
)]
#[ORM\Table(
    name: 'category'
)]
final class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: 'integer'
    )]
    private int $id;

    #[ORM\Column(
        name: 'name',
        type: 'string'
    )]
    #[Assert\NotBlank(
        groups: ['action']
    )]
    private ?string $name;

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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}