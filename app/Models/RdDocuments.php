<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class RdDocuments extends Model
{
    protected $table = "rd_documents";
	protected $guarded = ['id'];
    
}

