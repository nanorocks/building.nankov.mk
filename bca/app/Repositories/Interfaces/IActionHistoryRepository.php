<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Dtos\ActionHistoryDto;
use App\Models\ActionHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IActionHistoryRepository
{
    public function all(): LengthAwarePaginator;

    public function single(int $id): ActionHistory;

    public function create(ActionHistoryDto $dto): ActionHistory;

    public function delete(int $id): ActionHistory;
}
