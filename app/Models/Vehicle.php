<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'make_id',
        'model_id',
        'manufacture_year'
    ];

    public function makes()
    {
        return $this->hasMany(Make::class);
    }

    public function models()
    {
        return $this->hasMany(VehicleModel::class);
    }
}
