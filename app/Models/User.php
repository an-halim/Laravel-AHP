<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function userResult()
    {
        return $this->hasMany(UserResult::class);
    }

    public function is_admin()
    {
        return $this->role === 'Admin' || $this->role === 'admin';
    }

    /**
     * Get the user result that owns the user.
     */
    public function getResultLogged()
    {
        if (strtolower(auth()->user()->role) == "admin") {
            // Return all results if the user is an admin
            return $this->hasMany(UserResult::class);
        } else {
            // Return only results for the logged-in user
            return $this->hasMany(UserResult::class)->where('user_id', auth()->user()->id);
        }
    }
}
