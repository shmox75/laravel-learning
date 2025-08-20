<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FuelType extends Model
{
    use HasFactory;

    /*
    protected $table = 'car_fuel_types';
    protected $primaryKey = 'car_fuel_type_id';
    public $incrementing = false;
    protected $keyType = 'string';    
    */
    //const CREATED_AT = 'created_date'; 
    //const UPDATED_AT = 'updated_date'; //null
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    function cars(): HasMany {
        return $this->hasMany(Car::class);
    }
}
