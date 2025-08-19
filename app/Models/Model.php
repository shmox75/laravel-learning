<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquantModel;

class Model extends EloquantModel
{
    public $timestamps = false;
    protected $fillable = [
        'maker_id',
        'name'
    ];
}
