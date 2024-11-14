<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    /** @use HasFactory<\Database\Factories\BuildingFactory> */
    use HasFactory;

    const TABLE = 'buildings';

    const ID = 'id';
    const NAME = 'name';
    const SLUG = 'slug';
    const LOCATION = 'location';
    const PHOTO = 'photo';
    const TOTAL_FLOORS = 'total_floors';
    const R_COMPLEX_ID = 'complex_id';

    protected $table = self::TABLE;

    protected $fillable = [
        self::NAME,
        self::LOCATION,
        self::PHOTO,
        self::TOTAL_FLOORS,
        self::R_COMPLEX_ID,
    ];
}
