<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    // public function vets()
    // {
    //     return $this->belongsToMany(User::class, 'centre_vets', 'vet_center_id', 'vet_id');
    // }
}
