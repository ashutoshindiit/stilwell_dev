<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
