<?php

namespace App\Services;

use App\Dtos\CreateComplexDto;
use App\Dtos\UpdateComplexDto;
use App\Models\Complex;
use App\Services\Interfaces\IComplexService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ComplexService implements IComplexService
{

    public function all(): LengthAwarePaginator
    {
        // TODO: Implement all() method.
    }

    public function single(string $slug): Complex
    {
        // TODO: Implement single() method.
    }

    public function create(CreateComplexDto $dto): Complex
    {
        // TODO: Implement create() method.
    }

    public function update(UpdateComplexDto $dto, string $slug): Complex
    {
        // TODO: Implement update() method.
    }

    public function delete(string $slug): Complex
    {
        // TODO: Implement delete() method.
    }
}
