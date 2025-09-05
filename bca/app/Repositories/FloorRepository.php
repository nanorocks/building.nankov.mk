<?php

namespace App\Repositories;

use App\Dtos\CreateFloorDto;
use App\Dtos\UpdateFloorDto;
use App\Models\Floor;
use App\Repositories\Interfaces\IFloorRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class FloorRepository implements IFloorRepository
{

    public function all(): LengthAwarePaginator
    {
        return Floor::paginate(10);
    }

    public function single(string $slug): Floor
    {
        return Floor::where(Floor::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateFloorDto $dto): Floor
    {
        return Floor::create([
            Floor::SLUG => $dto->slug,
            Floor::FLOOR_NUM => $dto->floorNum,
            Floor::TOTAL_APARTMENTS => $dto->totalApartments,
            Floor::R_BUILDING_ID => $dto->buildingId,
            Floor::PHOTO => $dto->photo,
        ]);
    }

    public function update(UpdateFloorDto $dto, string $slug): Floor
    {
        try {
            $floor = Floor::where(Floor::SLUG, $slug)->firstOrFail();

            $updateData = array_filter([
                Floor::SLUG => $dto->slug,
                Floor::FLOOR_NUM => $dto->floorNum,
                Floor::TOTAL_APARTMENTS => $dto->totalApartments,
                Floor::R_BUILDING_ID => $dto->buildingId,
                Floor::PHOTO => $dto->photo,
            ], fn($value) => $value !== null);

            $floor->update($updateData);

            return $floor->fresh();
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Floor with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while updating the floor.');
        }
    }

    public function delete(string $slug): Floor
    {
        try {
            $floor = Floor::where(Floor::SLUG, $slug)->firstOrFail();

            if (!$floor->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $floor;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Floor with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the floor.');
        }
    }
}
