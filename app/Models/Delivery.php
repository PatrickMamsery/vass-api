<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'product_id',
        'client_id',
        'address_id',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'id', 'address_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
