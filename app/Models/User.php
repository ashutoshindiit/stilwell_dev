<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
         return $this->belongsTo(Role::class);
    }

    public function thumbnail($avatar)
    {
        if($avatar){
            return  asset("assets/images/user/images/{$avatar}");
        }else{
            return asset("assets/images/user/images/placeholder.png");
        }
    }

    public function permission($page,$access)
    {
        $role_id = Auth::user()->role_id;
        $permision = Permission::where('slug', $page)->select('id')->first();
        if($permision){
            $is_access = RolesPermission::where('role_id',$role_id)->where('permission_id',$permision->id)->where($access,1)->first();
            return ($is_access) ? true : false;
        }else{
            return false;
        }

    }
}
