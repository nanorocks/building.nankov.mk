<?php

namespace App\Repositories;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserRepository implements IUserRepository
{
    public function all(): LengthAwarePaginator
    {
        return User::all()->partition(10);
    }

    public function single(string $slug): User
    {
        return User::where(User::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateUserDto $dto): User
    {

    }

    public function update(UpdateUserDto $dto, string $slug): User
    {
        $user = User::where(User::SLUG, $slug)->firstOrFail();



    }

    public function delete(string $slug): User
    {
        try {
            $user = User::where(User::SLUG, $slug)->firstOrFail();

            if (!$user->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $user;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("User with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the user.');
        }
    }
}
