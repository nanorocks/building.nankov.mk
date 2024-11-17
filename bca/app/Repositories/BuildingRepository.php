<?php

namespace App\Repositories;

use App\Dtos\CreateBuildingDto;
use App\Dtos\UpdateBuildingDto;
use App\Models\Building;
use App\Models\Floor;
use App\Repositories\Interfaces\IBuildingRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class BuildingRepository implements IBuildingRepository
{

    public function all(): LengthAwarePaginator
    {
        return Building::all()->partition(10);
    }

    public function single(string $slug): Building
    {
        return Building::where(Building::SLUG, $slug)->firstOrFail();
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
        try {
            $building = Building::where(Building::SLUG, $slug)->firstOrFail();

            if (!$building->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $building;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Building with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the building.');
        }
    }
}
