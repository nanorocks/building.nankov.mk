<?php

namespace App\Repositories\Interfaces;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IUserRepository
{
    public function all(): LengthAwarePaginator;

    public function single(string $slug): User;

    public function create(CreateUserDto $dto): User;

    public function update(UpdateUserDto $dto, string $slug): User;

    public function delete(string $slug): User;
}
