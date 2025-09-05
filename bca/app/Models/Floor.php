<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Floor extends Model
{
    /** @use HasFactory<\Database\Factories\FloorFactory> */
    use HasFactory;

    const TABLE = 'floors';

    const ID = 'id';
    const SLUG = 'slug';
    const FLOOR_NUM = 'floor_num';
    const TOTAL_APARTMENTS = 'total_apartments';
    const PHOTO = 'photo';

    const R_BUILDING_ID = 'building_id';

    protected $table = self::TABLE;

    protected $fillable = [
        self::FLOOR_NUM,
        self::SLUG,
        self::TOTAL_APARTMENTS,
        self::PHOTO,
        self::R_BUILDING_ID
    ];

    /**
     * Get the building that owns this floor.
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, self::R_BUILDING_ID);
    }

    /**
     * Get all apartments for this floor.
     */
    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class, Apartment::R_FLOOR_ID);
    }
}
