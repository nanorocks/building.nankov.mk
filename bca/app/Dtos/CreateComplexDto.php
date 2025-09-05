<?php

namespace App\Dtos;

class CreateComplexDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $slug,
        public readonly string $location,
        public readonly ?string $photo = null
    ) {
    }
}
