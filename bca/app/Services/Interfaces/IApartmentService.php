<?php

namespace App\Services\Interfaces;

use App\Dtos\CreateApartmentDto;
use App\Dtos\UpdateApartmentDto;
use App\Models\Apartment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IApartmentService
{
    public function all(): LengthAwarePaginator;

    public function single(string $slug): Apartment;

    public function create(CreateApartmentDto $dto): Apartment;

    public function update(UpdateApartmentDto $dto, string $slug): Apartment;

    public function delete(string $slug): Apartment;
}
