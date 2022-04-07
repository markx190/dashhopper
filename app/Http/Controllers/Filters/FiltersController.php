<?php

namespace App\Http\Controllers\Filters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Positions;
use Auth;

class FiltersController extends Controller
{
    public function skillFilters(Request $request)
    {
        $getSkills = Positions::select('position_name')->where('position_type', $request->industryValue)
                                                       ->orderBy('position_name')->get(); 
            return response()->json($getSkills);
    }
}
