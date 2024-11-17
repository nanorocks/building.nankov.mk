<?php

namespace App\Repositories\Interfaces;

use App\Dtos\CreateBuildingDto;
use App\Dtos\UpdateBuildingDto;
use App\Models\Building;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IBuildingRepository
{
    public function all(): LengthAwarePaginator;

    public function single(string $slug): Building;

    public function create(CreateBuildingDto $dto): Building;

    public function update(UpdateBuildingDto $dto, string $slug): Building;

    public function delete(string $slug): Building;
}
