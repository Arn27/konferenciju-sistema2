<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Define a one-to-many or inverse relationship with User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
