<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CarImage;
use App\Models\CarFeatures;

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

    function features(): HasOne {
        return $this->hasOne(CarFeatures::class, 'car_id');
    }

    function primaryImage(): HasOne {
        return $this->hasOne(CarImage::class)->latestOfMany('position');
    }
}
