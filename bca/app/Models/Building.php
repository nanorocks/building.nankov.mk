<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get the complex that owns this building.
     */
    public function complex(): BelongsTo
    {
        return $this->belongsTo(Complex::class, self::R_COMPLEX_ID);
    }

    /**
     * Get all floors for this building.
     */
    public function floors(): HasMany
    {
        return $this->hasMany(Floor::class, Floor::R_BUILDING_ID);
    }
}
