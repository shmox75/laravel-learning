<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquantModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends EloquantModel
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'maker_id',
        'name'
    ];

    function maker(): BelongsTo {
        return $this->belongsTo(Maker::class);
    }


    function cars(): HasMany {
        return $this->hasMany(Car::class);
    }
}
