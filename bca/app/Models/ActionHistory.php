<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionHistory extends Model
{
    /** @use HasFactory<\Database\Factories\ApartmentFactory> */
    use HasFactory;

    const TABLE = 'actions_history';

    const ID = 'id';
    const STATUS = 'status';
    const MESSAGE = 'message';
    const LOG = 'log';

    protected $table = self::TABLE;

    protected $fillable = [
        self::STATUS,
        self::MESSAGE,
        self::LOG
    ];
}
