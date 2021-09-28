<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Lead extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [ 
            'project_name',	
            'project_type',	
            'first_name',	
            'last_name',
            'status',	
            'contact_id',
            'source',	
            'address',	
            'city',	
            'state',	
            'country',	
            'zipcode',	
            'notes'	,
            'active',	
        ];    
        
    public function contact()
    {
        return $this->belongsTo(Contact::class);
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
