<?php

namespace App\Dtos;

class UpdateComplexDto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $slug = null,
        public readonly ?string $location = null,
        public readonly ?string $photo = null
    ) {
    }
}
