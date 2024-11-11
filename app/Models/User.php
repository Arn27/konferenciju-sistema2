<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role_id'];

    // Define a one-to-many or one-to-one relationship with Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Check if the user has a specific role
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'user_conference');
    }
}
