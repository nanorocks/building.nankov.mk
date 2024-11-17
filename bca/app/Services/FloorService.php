<?php

namespace App\Services;

use App\Dtos\CreateFloorDto;
use App\Dtos\UpdateFloorDto;
use App\Models\Floor;
use App\Services\Interfaces\IFloorService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FloorService implements IFloorService
{

    public function all(): LengthAwarePaginator
    {
        // TODO: Implement all() method.
    }

    public function single(string $slug): Floor
    {
        // TODO: Implement single() method.
    }

    public function create(CreateFloorDto $dto): Floor
    {
        // TODO: Implement create() method.
    }

    public function update(UpdateFloorDto $dto, string $slug): Floor
    {
        // TODO: Implement update() method.
    }

    public function delete(string $slug): Floor
    {
        // TODO: Implement delete() method.
    }
}
