<?php

namespace App\Service\Dashboard;

use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;

class DashboardProvider
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ProjectRepository $projectRepository,
        private readonly TaskRepository $taskRepository,
    )
    {
    }

    public function getDashboards(): array
    {
        return [
            'usersCount' => $this->userRepository->getTotalRecords(),
            'projectsCount' => $this->projectRepository->getTotalRecords(),
            'tasksCount' => $this->taskRepository->getTotalRecords(),
        ];
    }
}
