<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\CreateBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Http\Resources\Apartment\AllResourse;
use App\Http\Resources\Apartment\CreateResource;
use App\Http\Resources\Apartment\DeleteResource;
use App\Http\Resources\Apartment\SingleResource;
use App\Http\Resources\Apartment\UpdateResource;
use App\Models\Building;
use App\Services\Interfaces\IBuildingService;

class BuildingController extends Controller
{

    public function __construct(private readonly IBuildingService $buildingService)
    {
    }

    public function all(): AllResourse
    {
        return new AllResourse($this->buildingService->all());
    }

    public function single(string $slug): SingleResource
    {
        return new SingleResource($this->buildingService->single($slug));
    }

    public function create(CreateBuildingRequest $request): CreateResource
    {
        return new CreateResource($this->buildingService->create($request->toDto()));
    }

    public function update(string $slug, UpdateBuildingRequest $request): UpdateResource
    {
        return new UpdateResource($this->buildingService->update($request->toDto(), $slug));
    }

    public function delete(string $slug): DeleteResource
    {
        return new DeleteResource($this->buildingService->delete($slug));
    }
}
