<?php

namespace App\Dtos;

class CreateBuildingDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $slug,
        public readonly string $location,
        public readonly int $totalFloors,
        public readonly int $complexId,
        public readonly ?string $photo = null
    ) {
    }
}
