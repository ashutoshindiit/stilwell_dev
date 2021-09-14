<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    use HasFactory;

    public function permision()
    {
        return $this->hasOne(Permission::class,'id','permission_id');
    }
}
