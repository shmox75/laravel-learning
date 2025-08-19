<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarImage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'position'
    ];

    function car(): BelongsTo {
        return $this->belongsTo(Car::class);
    }
}
