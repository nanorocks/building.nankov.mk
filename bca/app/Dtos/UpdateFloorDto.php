<?php

namespace App\Dtos;

class UpdateFloorDto
{
    public function __construct(
        public readonly ?string $slug = null,
        public readonly ?int $floorNum = null,
        public readonly ?int $totalApartments = null,
        public readonly ?int $buildingId = null,
        public readonly ?string $photo = null
    ) {
    }
}
