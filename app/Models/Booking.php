<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    
    use HasFactory;

    protected $fillable = [
        'client_id',
        'address_id',
        'from',
        'to',
        'date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'id', 'address_id');
    }
}
