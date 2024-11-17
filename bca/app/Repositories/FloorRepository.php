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
        return Floor::all()->partition(10);
    }

    public function single(string $slug): Floor
    {
        return Floor::where(Floor::SLUG, $slug)->firstOrFail();
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
