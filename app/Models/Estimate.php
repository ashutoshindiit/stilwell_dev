<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Estimate extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'first_name',
        'last_name',	
        'project_name',		
        'project_type',	
        'status',	
        'source',	
        'lead_id',
        'address',	
        'city',	
        'state',	
        'country',	
        'zipcode',	
        'notes',	
        'markups',	
        'active',	
    ];

    public function setMarkupsAttribute($value)
	{
	    $this->attributes['markups'] = json_encode($value);
	}

    public function getMarkupsAttribute($value)
	{
	    return json_decode($value);
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
