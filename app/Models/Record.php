<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'content',
        'action_date',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id', 'client_id');
    }
}
