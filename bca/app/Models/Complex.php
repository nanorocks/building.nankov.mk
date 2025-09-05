<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complex extends Model
{
    /** @use HasFactory<\Database\Factories\ComplexFactory> */
    use HasFactory;

    const TABLE = 'complexes';

    const ID = 'id';
    const NAME = 'name';
    const SLUG = 'slug';
    const LOCATION = 'location';
    const PHOTO = 'photo';

    protected $table = self::TABLE;

    protected $fillable = [
        self::NAME,
        self::SLUG,
        self::LOCATION,
        self::PHOTO,
    ];

    /**
     * Get all buildings for this complex.
     */
    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class, Building::R_COMPLEX_ID);
    }
}
