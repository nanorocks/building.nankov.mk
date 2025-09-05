<?php

namespace App\Dtos;

class CreateFloorDto
{
    public function __construct(
        public readonly string $slug,
        public readonly int $floorNum,
        public readonly int $totalApartments,
        public readonly int $buildingId,
        public readonly ?string $photo = null
    ) {
    }
}
