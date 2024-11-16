<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\StoreFloorRequest;
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

    public function __construct(private IFloorService $floorService)
    {
    }

    public function all()
    {
        return new AllResourse($this->floorService->all());
    }

    public function single()
    {
        return new SingleResource($this->floorService->single());
    }

    public function create()
    {
        return new CreateResource($this->floorService->create());
    }

    public function update()
    {
        return new UpdateResource($this->floorService->update());
    }

    public function delete()
    {
        return new DeleteResource($this->floorService->delete());
    }
}
