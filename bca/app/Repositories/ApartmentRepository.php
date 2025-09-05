<?php

namespace App\Repositories;

use App\Dtos\CreateApartmentDto;
use App\Dtos\UpdateApartmentDto;
use App\Models\Apartment;
use App\Models\Floor;
use App\Repositories\Interfaces\IApartmentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ApartmentRepository implements IApartmentRepository
{

    public function all(): LengthAwarePaginator
    {
        return Apartment::paginate(10);
    }

    public function single(string $slug): Apartment
    {
        return Apartment::where(Apartment::SLUG, $slug)->firstOrFail();
    }

    public function create(CreateApartmentDto $dto): Apartment
    {
        return Apartment::create([
            Apartment::TYPE => $dto->type,
            Apartment::SLUG => $dto->slug,
            Apartment::OWNER => $dto->owner,
            Apartment::STATUS => $dto->status,
            Apartment::PRICE => $dto->price,
            Apartment::DATE_COMPLETED => $dto->dateCompleted,
            Apartment::TERMS => $dto->terms,
            Apartment::DESCRIPTION => $dto->description,
            Apartment::R_FLOOR_ID => $dto->floorId,
            Apartment::PHOTO => $dto->photo,
        ]);
    }

    public function update(UpdateApartmentDto $dto, string $slug): Apartment
    {
        try {
            $apartment = Apartment::where(Apartment::SLUG, $slug)->firstOrFail();

            $updateData = array_filter([
                Apartment::TYPE => $dto->type,
                Apartment::SLUG => $dto->slug,
                Apartment::OWNER => $dto->owner,
                Apartment::STATUS => $dto->status,
                Apartment::PRICE => $dto->price,
                Apartment::DATE_COMPLETED => $dto->dateCompleted,
                Apartment::TERMS => $dto->terms,
                Apartment::DESCRIPTION => $dto->description,
                Apartment::R_FLOOR_ID => $dto->floorId,
                Apartment::PHOTO => $dto->photo,
            ], fn($value) => $value !== null);

            $apartment->update($updateData);

            return $apartment->fresh();
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Apartment with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while updating the apartment.');
        }
    }

    public function delete(string $slug): Apartment
    {
        try {
            $apartment = Apartment::where(Apartment::SLUG, $slug)->firstOrFail();

            if (!$apartment->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $apartment;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("Apartment with slug {$slug} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the apartment.');
        }
    }
}
