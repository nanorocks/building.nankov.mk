<?php

namespace App\Dtos;

class CreateUserDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $slug,
        public readonly string $password,
        public readonly array $roles = []
    ) {
    }
}
