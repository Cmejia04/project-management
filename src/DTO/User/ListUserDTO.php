<?php

namespace App\DTO\User;

use App\DTO\UserProject\UserProjectDTO;
use App\Entity\User;

class ListUserDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $identification,
        public int $phone,
        public bool $active,
        public string $updateAt,
    ) {}

    public static function fromEntity(User $user): self
    {
        return new self(
            id: $user->getId(),
            name: $user->getName(),
            email: $user->getEmail(),
            identification: $user->getIdentification(),
            phone: $user->getPhone(),
            active: $user->isActive(),
            updateAt: $user->getUpdatedAt()->format('Y-m-d'),
        );
    }
}
