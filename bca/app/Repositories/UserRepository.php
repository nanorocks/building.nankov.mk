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
        return User::paginate(10);
    }

    public function single(string $slug): User
    {
        return User::where(User::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateUserDto $dto): User
    {
        return User::create([
            User::NAME => $dto->name,
            User::EMAIL => $dto->email,
            User::SLUG => $dto->slug,
            User::PASSWORD => $dto->password,
            User::ROLES => $dto->roles,
        ]);
    }

    public function update(UpdateUserDto $dto, string $slug): User
    {
        try {
            $user = User::where(User::SLUG, $slug)->firstOrFail();

            $updateData = array_filter([
                User::NAME => $dto->name,
                User::EMAIL => $dto->email,
                User::SLUG => $dto->slug,
                User::PASSWORD => $dto->password,
                User::ROLES => $dto->roles,
            ], fn($value) => $value !== null);

            $user->update($updateData);

            return $user->fresh();
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("User with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while updating the user.');
        }
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
