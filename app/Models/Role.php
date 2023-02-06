<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function GetPermissionIds()
    {
        return $this->permissions()->pluck('id')->toArray();
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('title', $permission)->exists();
    }
}
