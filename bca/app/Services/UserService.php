<?php

namespace App\Services;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use App\Services\Interfaces\IUserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService implements IUserService
{

    public function all(): LengthAwarePaginator
    {
        // TODO: Implement all() method.
    }

    public function single(string $slug): User
    {
        // TODO: Implement single() method.
    }

    public function create(CreateUserDto $dto): User
    {
        // TODO: Implement create() method.
    }

    public function update(UpdateUserDto $dto, string $slug): User
    {
        // TODO: Implement update() method.
    }

    public function delete(string $slug): User
    {
        // TODO: Implement delete() method.
    }
}
