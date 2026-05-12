<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'username', 'email', 'password', 'role_id', 'menu_state',
    ];

    public function getImageAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/admins/'.$value) : '';
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasAbility($permissions)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (! $role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } elseif (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }

        return false;
    }
}
