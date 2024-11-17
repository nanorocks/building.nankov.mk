<?php

namespace App\Services;

use App\Dtos\CreateBuildingDto;
use App\Dtos\UpdateBuildingDto;
use App\Models\Building;
use App\Services\Interfaces\IBuildingService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BuildingService implements IBuildingService
{

    public function all(): LengthAwarePaginator
    {
        // TODO: Implement all() method.
    }

    public function single(string $slug): Building
    {
        // TODO: Implement single() method.
    }

    public function create(CreateBuildingDto $dto): Building
    {
        // TODO: Implement create() method.
    }

    public function update(UpdateBuildingDto $dto, string $slug): Building
    {
        // TODO: Implement update() method.
    }

    public function delete(string $slug): Building
    {
        // TODO: Implement delete() method.
    }
}
