<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\StoreComplexRequest;
use App\Http\Requests\UpdateComplexRequest;
use App\Http\Resources\Apartment\AllResourse;
use App\Http\Resources\Apartment\CreateResource;
use App\Http\Resources\Apartment\DeleteResource;
use App\Http\Resources\Apartment\SingleResource;
use App\Http\Resources\Apartment\UpdateResource;
use App\Models\Complex;
use App\Services\Interfaces\IComplexService;

class ComplexController extends Controller
{

    public function __construct(private IComplexService $complexService)
    {
    }

    public function all()
    {
        return new AllResourse($this->complexService->all());
    }

    public function single()
    {
        return new SingleResource($this->complexService->single());
    }

    public function create()
    {
        return new CreateResource($this->complexService->create());
    }

    public function update()
    {
        return new UpdateResource($this->complexService->update());
    }

    public function delete()
    {
        return new DeleteResource($this->complexService->delete());
    }
}
