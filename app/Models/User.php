<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Ensure role_id is fillable if you assign roles during creation
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define the relationship with the Role model.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Define the relationship with the Conference model for registrations.
     */
    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'users_conferences');
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }
}
