<?php

namespace App\Repositories\Interfaces;

use App\Dtos\CreateComplexDto;
use App\Dtos\UpdateComplexDto;
use App\Models\Complex;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IComplexRepository
{
    public function all(): LengthAwarePaginator;

    public function single(string $slug): Complex;

    public function create(CreateComplexDto $dto): Complex;

    public function update(UpdateComplexDto $dto, string $slug): Complex;

    public function delete(string $slug): Complex;
}
