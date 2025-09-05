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
        return Complex::paginate(10);
    }

    public function single(string $slug): Complex
    {
        return Complex::where(Complex::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateComplexDto $dto): Complex
    {
        return Complex::create([
            Complex::NAME => $dto->name,
            Complex::SLUG => $dto->slug,
            Complex::LOCATION => $dto->location,
            Complex::PHOTO => $dto->photo,
        ]);
    }

    public function update(UpdateComplexDto $dto, string $slug): Complex
    {
        try {
            $complex = Complex::where(Complex::SLUG, $slug)->firstOrFail();

            $updateData = array_filter([
                Complex::NAME => $dto->name,
                Complex::SLUG => $dto->slug,
                Complex::LOCATION => $dto->location,
                Complex::PHOTO => $dto->photo,
            ], fn($value) => $value !== null);

            $complex->update($updateData);

            return $complex->fresh();
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Complex with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while updating the complex.');
        }
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
