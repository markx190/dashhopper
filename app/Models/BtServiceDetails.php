<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BtServiceDetails extends Model
{
    protected $table = 'bt_services_details';
    protected $guarded = ['id'];
    
    public static function getTravelAndTours()
    {
        $travelAndTours = self::where('type_of_trip', 'Special Trip')->limit(8)->get();
            return $travelAndTours;
    }

    public static function getStandardFares()
    {
        $standardFares = self::where('type_of_trip', 'Standard Fare')->limit(8)->get();
            return $standardFares;
    }

    public static function getHandyMan()
    {
        $featured = self::whereIn('service_industry', ['Carpentry', 'Coaters'])->limit(8)->get();
            return $featured;
    }

    public static function tFilters()
    {
        $tFilters = self::select('service_origin')->groupBy('service_origin')->get();
            return $tFilters;
    }
}

