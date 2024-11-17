<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\CreateFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Resources\Apartment\AllResourse;
use App\Http\Resources\Apartment\CreateResource;
use App\Http\Resources\Apartment\DeleteResource;
use App\Http\Resources\Apartment\SingleResource;
use App\Http\Resources\Apartment\UpdateResource;
use App\Models\Floor;
use App\Services\Interfaces\IFloorService;

class FloorController extends Controller
{

    public function __construct(private readonly IFloorService $floorService)
    {
    }

    public function all(): AllResourse
    {
        return new AllResourse($this->floorService->all());
    }

    public function single(string $slug): SingleResource
    {
        return new SingleResource($this->floorService->single($slug));
    }

    public function create(CreateFloorRequest $request): CreateResource
    {
        return new CreateResource($this->floorService->create($request->toDto()));
    }

    public function update(string $slug, UpdateFloorRequest $request): UpdateResource
    {
        return new UpdateResource($this->floorService->update($request->toDto(), $slug));
    }

    public function delete(string $slug): DeleteResource
    {
        return new DeleteResource($this->floorService->delete($slug));
    }
}
