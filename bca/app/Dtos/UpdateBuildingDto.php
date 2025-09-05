<?php

namespace App\Dtos;

class UpdateBuildingDto
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $slug = null,
        public readonly ?string $location = null,
        public readonly ?int $totalFloors = null,
        public readonly ?int $complexId = null,
        public readonly ?string $photo = null
    ) {
    }
}
