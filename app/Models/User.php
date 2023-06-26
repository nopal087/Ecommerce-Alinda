<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['id', 'name', 'email', 'nohp', 'alamat', 'password', 'role'];


    public function getTable()
    {
        return 'users';
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function hasAnyRole(...$roles)
    {
        return in_array($this->role, $roles);
    }

    public function cartItems()
    {
        return $this->hasMany(CartModel::class, 'id');
    }




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
}
