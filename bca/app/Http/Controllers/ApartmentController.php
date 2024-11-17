<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\CreateApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Http\Resources\Apartment\AllResourse;
use App\Http\Resources\Apartment\CreateResource;
use App\Http\Resources\Apartment\DeleteResource;
use App\Http\Resources\Apartment\SingleResource;
use App\Http\Resources\Apartment\UpdateResource;
use App\Models\Apartment;
use App\Services\Interfaces\IApartmentService;

class ApartmentController extends Controller
{
    public function __construct(private readonly IApartmentService $apartmentService)
    {
    }

    public function all(): AllResourse
    {
        return new AllResourse($this->apartmentService->all());
    }

    public function single(string $slug): SingleResource
    {
        return new SingleResource($this->apartmentService->single($slug));
    }

    public function create(CreateApartmentRequest $request): CreateResource
    {
        return new CreateResource($this->apartmentService->create($request->toDto()));
    }

    public function update(string $slug, UpdateApartmentRequest $request): UpdateResource
    {
        return new UpdateResource($this->apartmentService->update($request->toDto(), $slug));
    }

    public function delete(string $slug): DeleteResource
    {
        return new DeleteResource($this->apartmentService->delete($slug));
    }
}
