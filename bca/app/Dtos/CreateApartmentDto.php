<?php

namespace App\Dtos;

class CreateApartmentDto
{
    public function __construct(
        public readonly string $type,
        public readonly string $slug,
        public readonly string $owner,
        public readonly string $status,
        public readonly float $price,
        public readonly string $dateCompleted,
        public readonly string $terms,
        public readonly string $description,
        public readonly int $floorId,
        public readonly ?string $photo = null
    ) {
    }
}
