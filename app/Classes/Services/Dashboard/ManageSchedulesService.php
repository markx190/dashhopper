<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\Models\Schedules;
use App\Models\Employees;
use App\User;
use DB;
use Exception;
use Auth;

class ManageSchedulesService
{
    public function indexView()
    {
        try {
            date_default_timezone_set('Asia/Manila');
            $dTime = date('F j, Y');
            $hicUsers = User::all();
            $tripDrivers = Employees::where('position', 'Driver')->get();
            $tripConductors = Employees::where('position', 'Driver')->get();
            return view('velhopper.manage_list_of_schedules', [
                'hicUsers' => $hicUsers,
                'dateTime' => $dTime,
                'tripDrivers' => $tripDrivers
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function schedulesDataTable($request)
    {
        try {
            $querySchedules = DB::table('travel_schedules')
                            ->select('id', 
                            'hic_id_no', 
                            'travel_id_no',
                            'bus_id_no',
                            'bus_number',
                            'bus_type',
                            'no_of_seats',
                            'with_wifi',
                            'with_cr',
                            'bus_avatar',
                            'company_name',
                            'site_terminal', 
                            'origin_address', 
                            'destination_address', 
                            'main_destination',
                            'fare_amount',
                            'driver_name',
                            'conductor_name',
                            'travel_date', 
                            'travel_time', 
                            'time_ap',
                            'travel_status', 
                            'created_by',  
                            'created_at')->where('company_name', Auth::user()->hic_name);                  

                    if ($request->busTypeVal){
                        $querySchedules->where('bus_type', $request->busTypeVal); 
                    }

                    if ($request->busTypeVal == 'All'){
                        $querySchedules = DB::table('travel_schedules')
                            ->select('id', 
                            'hic_id_no', 
                            'travel_id_no',
                            'bus_id_no',
                            'bus_number',
                            'bus_type',
                            'no_of_seats',
                            'with_wifi',
                            'with_cr',
                            'bus_avatar',
                            'company_name',
                            'site_terminal', 
                            'origin_address', 
                            'destination_address', 
                            'main_destination',
                            'fare_amount',
                            'driver_name',
                            'conductor_name',
                            'travel_date', 
                            'travel_time', 
                            'time_ap',
                            'travel_status', 
                            'created_by',  
                            'created_at')->where('company_name', Auth::user()->hic_name);                    
                        }
                    $querySchedules->get();
                    
                    $queryResults = datatables()->of($querySchedules);
                    return $queryResults
                    ->editColumn('bus_number', function ($data) {
                        return $data->bus_number .' '. $data->bus_type;
                    })
                    ->editColumn('origin_address', function ($data) {
                        return $data->site_terminal .' to '. $data->destination_address;
                    })
                    ->editColumn('travel_date', function ($data) {
                        return $data->travel_date .' to '. $data->travel_time .' '. $data->time_ap;
                    })
                    ->editColumn('driver_name', function ($data) {
                        return $data->driver_name .' and '. $data->conductor_name;
                    })
                    ->addColumn('action', function ($data) {
                    $action = '
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-warning btn-xs" type="button"
                            data-s_id="'. $data->id .'"
                            data-hic_id_no="'. $data->hic_id_no .'"
                            data-travel_id_no="'. $data->travel_id_no .'"
                            onclick="showPassengersModal(this)">
                            <i class="fa fa-list"></i> Passengers
                        </button>
                    </a>
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-primary btn-xs" type="button"
                            data-s_id="'. $data->id .'"
                            data-hic_id_no="'. $data->hic_id_no .'"
                            data-travel_id_no="'. $data->travel_id_no .'"
                            data-bus_id_no="'. $data->bus_id_no .'"
                            data-bus_number="'. $data->bus_number .'"
                            data-bus_type="'. $data->bus_type .'"
                            data-no_of_seats="'. $data->no_of_seats .'"
                            data-with_wifi="'. $data->with_wifi .'"
                            data-with_cr="'. $data->with_cr .'"
                            data-bus_avatar="'. $data->bus_avatar .'" 
                            data-company_name="'. $data->company_name .'"
                            data-site_terminal="'. $data->site_terminal .'"
                            data-origin_address="'. $data->origin_address .'"
                            data-destination_address="'. $data->destination_address .'"
                            data-main_destination="'. $data->main_destination .'"
                            data-fare_amount="'. $data->fare_amount .'"
                            data-driver_name="'. $data->driver_name .'"
                            data-conductor_name="'. $data->conductor_name .'"
                            data-travel_date="'. $data->travel_date .'"
                            data-travel_time="'. $data->travel_time .'"
                            data-time_ap="'. $data->time_ap .'"
                            data-travel_status="'. $data->travel_status .'"
                            data-created_by="'. $data->created_by .'"
                            data-created_at="'. $data->created_at .'"
                            onclick="showEditTripsModal(this)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </a>
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-danger btn-xs" type="button"
                            data-s_id="'. $data->id .'"
                            data-hic_id_no="'. $data->hic_id_no .'"
                            data-travel_id_no="'. $data->travel_id_no .'"
                            data-bus_id_no="'. $data->bus_id_no .'"
                            data-bus_number="'. $data->bus_number .'"
                            data-bus_type="'. $data->bus_type .'"
                            data-no_of_seats="'. $data->no_of_seats .'"
                            data-with_wifi="'. $data->with_wifi .'"
                            data-with_cr="'. $data->with_cr .'"
                            data-bus_avatar="'. $data->bus_avatar .'" 
                            data-company_name="'. $data->company_name .'"
                            data-site_terminal="'. $data->site_terminal .'"
                            data-origin_address="'. $data->origin_address .'"
                            data-destination_address="'. $data->destination_address .'"
                            data-main_destination="'. $data->main_destination .'"
                            data-fare_amount="'. $data->fare_amount .'"
                            data-driver_name="'. $data->driver_name .'"
                            data-conductor_name="'. $data->conductor_name .'"
                            data-travel_date="'. $data->travel_date .'"
                            data-travel_time="'. $data->travel_time .'"
                            data-time_ap="'. $data->time_ap .'"
                            data-travel_status="'. $data->travel_status .'"
                            data-created_by="'. $data->created_by .'"
                            data-created_at="'. $data->created_at .'"
                            onclick="showDeleteTripsModal(this)">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </a>
                    ';
                return $action;
            })
            ->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function editSchedules(Request $request)
    {
        try {
            $updatedSchedules = Schedules::saveUpdatedSchedules($request);
            return $updatedSchedules;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function deleteSchedules(Request $request)
    {
        try {
            $deletedSchedules =  Schedules::saveDeleteSchedules($request);
            return $deletedSchedules;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

}
