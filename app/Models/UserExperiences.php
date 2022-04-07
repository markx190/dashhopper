<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExperiences extends Model
{
    // use SoftDeletes;
    //protected $table = 'members';
    protected $table = "user_experiences";
    
    protected $fillable = ['id', 'exp_id_no','spock_id_no', 'affiliation', 
                           'job_title', 'year_from', 'year_to', 'company_name', 
						   'product_handled', 'product_type'];	
	
	protected $guarded = ['id'];
	
}

