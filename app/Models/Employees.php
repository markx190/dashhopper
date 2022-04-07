<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employees extends Model
{
    protected $table = "employees";
	protected $guarded = ['id'];
    
}

