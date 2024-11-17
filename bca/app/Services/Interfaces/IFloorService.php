<?php

namespace App\Services\Interfaces;

use App\Dtos\CreateFloorDto;
use App\Dtos\UpdateFloorDto;
use App\Models\Floor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IFloorService
{
    public function all(): LengthAwarePaginator;

    public function single(string $slug): Floor;

    public function create(CreateFloorDto $dto): Floor;

    public function update(UpdateFloorDto $dto, string $slug): Floor;

    public function delete(string $slug): Floor;
}
