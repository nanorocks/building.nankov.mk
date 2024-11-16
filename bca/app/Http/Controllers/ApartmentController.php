<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Requests\StoreApartmentRequest;
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
    public function __construct(private IApartmentService $apartmentService)
    {
    }

    public function all()
    {
        return new AllResourse($this->apartmentService->all());
    }

    public function single()
    {
        return new SingleResource($this->apartmentService->single());
    }

    public function create()
    {
        return new CreateResource($this->apartmentService->create());
    }

    public function update()
    {
        return new UpdateResource($this->apartmentService->update());
    }

    public function delete()
    {
        return new DeleteResource($this->apartmentService->delete());
    }
}
