<?php

namespace App\Dtos;

class UpdateApartmentDto
{
    public function __construct(
        public readonly ?string $type = null,
        public readonly ?string $slug = null,
        public readonly ?string $owner = null,
        public readonly ?string $status = null,
        public readonly ?float $price = null,
        public readonly ?string $dateCompleted = null,
        public readonly ?string $terms = null,
        public readonly ?string $description = null,
        public readonly ?int $floorId = null,
        public readonly ?string $photo = null
    ) {
    }
}
