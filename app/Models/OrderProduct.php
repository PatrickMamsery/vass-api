<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'order_id',
        'product_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
