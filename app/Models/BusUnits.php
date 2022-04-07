<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusUnits extends Model
{
    protected $table = "bus_units";
	protected $guarded = ['id'];
    
}

