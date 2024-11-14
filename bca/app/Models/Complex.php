<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
