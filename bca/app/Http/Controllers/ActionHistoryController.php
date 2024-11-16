<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Http\Resources\AllResourse;
use App\Http\Resources\CreateResource;
use App\Http\Resources\DeleteResource;
use App\Http\Resources\SingleResource;
use App\Http\Resources\UpdateResource;
use App\Services\Interfaces\IActionHistoryService;

class ActionHistoryController extends Controller
{

    public function __construct(private IActionHistoryService $actionHistoryService)
    {
    }


    public function all()
    {
        return new AllResourse($this->actionHistoryService->all());
    }

    public function single()
    {
        return new SingleResource($this->actionHistoryService->single());
    }

    public function create()
    {
        return new CreateResource($this->actionHistoryService->create());
    }

    public function update()
    {
        return new UpdateResource($this->actionHistoryService->update());
    }

    public function delete()
    {
        return new DeleteResource($this->actionHistoryService->delete());
    }
}
