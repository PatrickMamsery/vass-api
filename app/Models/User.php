<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'mname',
        'sname',
        'email',
        'phone',
        'address',
        'role_id',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // return full name of user
    public function getNameAttribute()
    {
        return "{$this->fname} {$this->mname} {$this->lname}";
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function vetDetails()
    {
        return $this->hasOne(VetDetails::class, 'user_id', 'id');
    }

    public function vetCenter()
    {
        return $this->hasOne(CentreVet::class, 'vet_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'vet_id', 'id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'owner_id', 'id');
    }
}
