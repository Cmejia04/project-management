<?php

namespace App\Service\User;

use App\DTO\User\ListUserDTO;
use App\Entity\User;
use App\Repository\UserRepository;

class UserProvider
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function getUsers(): array
    {
        return array_map(fn(User $user) => ListUserDTO::fromEntity($user), $this->userRepository->findAll());
    }
}
