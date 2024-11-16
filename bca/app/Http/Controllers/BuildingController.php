<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\StoreBuildingRequest;
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

    public function __construct(private IBuildingService $buildingService)
    {
    }

    public function all()
    {
        return new AllResourse($this->buildingService->all());
    }

    public function single()
    {
        return new SingleResource($this->buildingService->single());
    }

    public function create()
    {
        return new CreateResource($this->buildingService->create());
    }

    public function update()
    {
        return new UpdateResource($this->buildingService->update());
    }

    public function delete()
    {
        return new DeleteResource($this->buildingService->delete());
    }
}
