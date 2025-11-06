<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Service\Task\TaskProvider;
use App\Service\User\UserProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/api/user/list', name: 'api_user_list', methods: ['GET'])]
    public function list(
        UserProvider $userProvider,
    ): JsonResponse
    {
        return $this->json($userProvider->getUsers());
    }

    #[Route('/api/user/{user}/tasks', name: 'api_user_tasks', methods: ['GET'])]
    public function getTasksByUser(
        TaskProvider $taskProvider,
        User $user,
    ): JsonResponse
    {
        return $this->json($taskProvider->getTasksByUser($user));
    }
}
