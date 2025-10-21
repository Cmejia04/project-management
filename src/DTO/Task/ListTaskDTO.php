<?php

namespace App\DTO\Task;

use App\Entity\Task;

class ListTaskDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public string $project,
        public string $user,
        public ?float $rate,
        public bool $active,
        public string $updateAt,
    ) {}

    public static function fromEntity(Task $task): self
    {
        return new self(
            id: $task->getId(),
            name: $task->getName(),
            description: $task->getDescription(),
            project: $task->getUserProject()?->getProject()?->getName() ?? '',
            user: $task->getUserProject()?->getUser()?->getName() ?? '',
            rate: $task->getUserProject()?->getRate() ?? '',
            active: $task->isActive(),
            updateAt: $task->getUpdatedAt()->format('Y-m-d'),
        );
    }
}
