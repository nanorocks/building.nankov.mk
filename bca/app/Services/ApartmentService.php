<?php

namespace App\Services;

use App\Dtos\CreateApartmentDto;
use App\Dtos\UpdateApartmentDto;
use App\Models\Apartment;
use App\Services\Interfaces\IApartmentService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApartmentService implements IApartmentService
{

    public function all(): LengthAwarePaginator
    {
        // TODO: Implement all() method.
    }

    public function single(string $slug): Apartment
    {
        // TODO: Implement single() method.
    }

    public function create(CreateApartmentDto $dto): Apartment
    {
        // TODO: Implement create() method.
    }

    public function update(UpdateApartmentDto $dto, string $slug): Apartment
    {
        // TODO: Implement update() method.
    }

    public function delete(string $slug): Apartment
    {
        // TODO: Implement delete() method.
    }
}
