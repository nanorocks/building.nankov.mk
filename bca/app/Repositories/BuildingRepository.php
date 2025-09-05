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
        return Building::paginate(10);
    }

    public function single(string $slug): Building
    {
        return Building::where(Building::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateBuildingDto $dto): Building
    {
        return Building::create([
            Building::NAME => $dto->name,
            Building::SLUG => $dto->slug,
            Building::LOCATION => $dto->location,
            Building::TOTAL_FLOORS => $dto->totalFloors,
            Building::R_COMPLEX_ID => $dto->complexId,
            Building::PHOTO => $dto->photo,
        ]);
    }

    public function update(UpdateBuildingDto $dto, string $slug): Building
    {
        try {
            $building = Building::where(Building::SLUG, $slug)->firstOrFail();

            $updateData = array_filter([
                Building::NAME => $dto->name,
                Building::SLUG => $dto->slug,
                Building::LOCATION => $dto->location,
                Building::TOTAL_FLOORS => $dto->totalFloors,
                Building::R_COMPLEX_ID => $dto->complexId,
                Building::PHOTO => $dto->photo,
            ], fn($value) => $value !== null);

            $building->update($updateData);

            return $building->fresh();
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Building with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while updating the building.');
        }
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
