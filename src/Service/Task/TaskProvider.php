<?php

namespace App\Service\Task;

use App\DTO\Task\ListTaskDTO;
use App\Entity\Task;
use App\Entity\User;
use App\Entity\UserProject;
use App\Repository\TaskRepository;

class TaskProvider
{
    public function __construct(
        private readonly TaskRepository $taskRepository,
    )
    {
    }

    public function getTasks(): array
    {
        return array_map(fn(Task $task) => ListTaskDTO::fromEntity($task), $this->taskRepository->findAll());
    }

    public function getTasksByUser(User $user): array
    {
        return array_map(fn(UserProject $userProject) => ListTaskDTO::fromEntity($userProject->getTasks()->first()), $user->getUserProjects()->toArray());
    }
}
