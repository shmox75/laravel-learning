<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CarImage;
use App\Models\CarFeatures;
use App\Models\Model as CarModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at'
    ];

    function carType(): BelongsTo {
        return $this->BelongsTo(CarType::class);
    }

    function fuelType(): BelongsTo {
        return $this->belongsTo(FuelType::class);
    }

    function maker(): BelongsTo {
        return $this->belongsTo(Maker::class);
    }

    function model(): BelongsTo {
        return $this->belongsTo(CarModel::class);
    }

    function owner(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }

    function features(): HasOne {
        return $this->hasOne(CarFeatures::class, 'car_id');
    }

    function primaryImage(): HasOne {
        return $this->hasOne(CarImage::class)->latestOfMany('position');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class, 'car_id', 'id');
    }

    function favoredUsers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'favorite_cars', 'car_id', 'user_id')->withTimestamps();
    }
}
