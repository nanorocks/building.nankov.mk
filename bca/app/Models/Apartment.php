<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /** @use HasFactory<\Database\Factories\ApartmentFactory> */
    use HasFactory;

    const TABLE = 'apartments';

    const TYPE = 'type';
    const SLUG = 'slug';
    const OWNER = 'owner';
    const STATUS = 'status';
    const PRICE = 'price';
    const DATE_COMPLETED = 'date_completed';
    const TERMS = 'terms';
    const DESCRIPTION = 'description';
    const PHOTO = 'photo';

    const R_FLOOR_ID = 'floor_id';

    protected $table = self::TABLE;

    protected $fillable = [
        self::TYPE,
        self::OWNER,
        self::SLUG,
        self::STATUS,
        self::PRICE,
        self::DATE_COMPLETED,
        self::TERMS,
        self::DESCRIPTION,
        self::PHOTO,
        self::R_FLOOR_ID
    ];
}
