<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use Translatable;

    public $timestamps = false;

    protected $fillable = [
        'permissions',   // json field
    ];

    public $translatedAttributes = ['name'];

    public function role_translations()
    {
        return $this->hasMany(RoleTranslation::class, 'role_id');
    }

    public function getPermissionsAttribute($permissions)
    {
        return json_decode($permissions, true);
    }
}
