<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [  
                'primary_f_name',
                'primary_l_name',
                'primary_phone_1',
                'primary_phone_1_type',
                'primary_phone_2',
                'primary_phone_2_type',
                'primary_email',
                'relationship',
                'secondary_f_name',
                'secondary_l_name',
                'secondary_phone_1',
                'secondary_phone_1_type',
                'secondary_phone_2',
                'secondary_phone_2_type',
                'secondary_email',
                'address',
                'city',
                'state',
                'country',
                'zipcode',
                'company',
                'title',
                'notes',
                'source',
                'label',
                'avatar',
                'status',
                'active',
                'user_id'
            ]; 

    public function getFullNameAttribute()
    {
        return ucfirst($this->primary_f_name) . ' ' . ucfirst($this->primary_l_name);
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = Auth::user()->id;
    }

    public function save(array $options = array())
    {
        if( ! $this->user_id)
        {
            $this->user_id = Auth::user()->id;
        }

        parent::save($options);
    }

    public static function query()
    {
        $query = parent::query();
        $query->where('user_id',Auth::user()->id);
        return $query;
    }
}
