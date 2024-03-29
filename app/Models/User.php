<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts =
        [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class);
    }

    public function hasFavorite($favorite_id)
    {
        return $this->favorites()->where('product_id', $favorite_id)->exists();
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
