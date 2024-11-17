<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\CreateComplexRequest;
use App\Http\Requests\UpdateComplexRequest;
use App\Http\Resources\Apartment\AllResourse;
use App\Http\Resources\Apartment\CreateResource;
use App\Http\Resources\Apartment\DeleteResource;
use App\Http\Resources\Apartment\SingleResource;
use App\Http\Resources\Apartment\UpdateResource;
use App\Services\Interfaces\IComplexService;

class ComplexController extends Controller
{

    public function __construct(private readonly IComplexService $complexService)
    {
    }

    public function all(): AllResourse
    {
        return new AllResourse($this->complexService->all());
    }

    public function single(string $slug): SingleResource
    {
        return new SingleResource($this->complexService->single($slug));
    }

    public function create(CreateComplexRequest $request): CreateResource
    {
        return new CreateResource($this->complexService->create($request->toDto()));
    }

    public function update(string $slug, UpdateComplexRequest $request): UpdateResource
    {
        return new UpdateResource($this->complexService->update($request->toDto(), $slug));
    }

    public function delete(string $slug): DeleteResource
    {
        return new DeleteResource($this->complexService->delete($slug));
    }
}
