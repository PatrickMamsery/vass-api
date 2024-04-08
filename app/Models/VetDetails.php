<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VetDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license_no',
        'license_expiry',
        'licence_copy',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
