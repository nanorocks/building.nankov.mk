<?php

namespace App\Dtos;

class UpdateUserDto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $email = null,
        public readonly ?string $slug = null,
        public readonly ?string $password = null,
        public readonly ?array $roles = null
    ) {
    }
}
