<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vet_id',
        'user_id',
        'date',
        'from',
        'to',
        'status',
    ];

    public function vet()
    {
        return $this->belongsTo(User::class, 'vet_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
