<?php

namespace App\Repositories;

use App\Dtos\CreateComplexDto;
use App\Dtos\UpdateComplexDto;
use App\Models\Complex;
use App\Repositories\Interfaces\IComplexRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ComplexRepository implements IComplexRepository
{

    public function all(): LengthAwarePaginator
    {
        return Complex::all()->partition(10);
    }

    public function single(string $slug): Complex
    {
        return Complex::where(Complex::SLUG, $slug)->firstOrFail();
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
        try {
            $complex = Complex::where(Complex::SLUG, $slug)->firstOrFail();

            if (!$complex->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $complex;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Complex with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the complex.');
        }
    }
}
