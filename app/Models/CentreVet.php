<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreVet extends Model
{
    use HasFactory;

    protected $fillable = [
        'vet_center_id',
        'vet_id',
    ];

    public function center()
    {
        return $this->belongsTo(VetCenter::class, 'vet_center_id', 'id');
    }

    public function vet()
    {
        return $this->belongsTo(User::class, 'vet_id', 'id');
    }
}
