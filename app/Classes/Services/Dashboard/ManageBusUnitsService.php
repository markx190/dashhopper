<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\BusUnits;
use App\Models\Schedules;
use App\Models\Employees;
use DB;
use Exception;
use Auth;
use Validator;
use Image;

class ManageBusUnitsService
{
    public function indexView()
    {
        try {
            date_default_timezone_set('Asia/Manila');
            $dTime = date('F j, Y');
            $hicUsers = User::all();
            $busTypes = Constants::BUS_TYPES;
            $drivers = Employees::where('position', 'Driver')->get();
            $conductors = Employees::where('position', 'Conductor')->get();
                return view('velhopper.manage_list_of_bus_units', [
                    'hicUsers' => $hicUsers,
                    'busTypes' => $busTypes,
                    'drivers' => $drivers,
                    'conductors' => $conductors,
                    'companyName' => Auth::user()->hic_name,
                    'siteTerminal' => Auth::user()->hic_network,
                    'dateTime' => $dTime
                ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTripDrivers($request)
    {
        try {
    
            $drivers = Employees::where('position', 'Driver')->get();
               return response()->json($drivers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTripConductors($request)
    {
        try {
            $conductors = Employees::where('position', 'Conductor')->get();
               return response()->json($conductors);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function busDataTable($request)
    {
        try {
            $queryBusUnits = DB::table('bus_units')
                            ->select('id', 
                            'hic_id_no', 
                            'bus_id_no',
                            'bus_number', 
                            'bus_type', 
                            'with_wifi', 
                            'with_cr',
                            'site_terminal',
                            'company_name', 
                            'no_of_seats', 
                            'bus_routes', 
                            'bus_avatar',
                            'created_at')->where('company_name', Auth::user()->hic_name);                  

            if ($request->busTypeVal){
                $queryBusUnits->where('bus_type', $request->busTypeVal); 
            }

            if ($request->busTypeVal == 'All'){
                $queryBusUnits = DB::table('bus_units')
                            ->select('id', 
                            'hic_id_no', 
                            'bus_id_no',
                            'bus_number', 
                            'bus_type', 
                            'with_wifi', 
                            'with_cr',
                            'company_name', 
                            'site_terminal',
                            'no_of_seats', 
                            'bus_routes', 
                            'bus_avatar',
                            'created_at')->where('company_name', Auth::user()->hic_name);               
            }

            $queryBusUnits->get();

            $queryResults = datatables()->of($queryBusUnits);
                return $queryResults
                    ->addColumn('action', function ($data) {
                        $editBusId = $data->id;
                        $deleteBusId = $data->id;
                    
                        $action = '
                            <a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-warning btn-xs" type="button"
                                    data-hic_id="'. $data->id .'"
                                    data-bus_id_no="'. $data->bus_id_no .'"
                                    data-company_name="'. $data->company_name .'"
                                    data-bus_avatar="'. $data->bus_avatar .'"
                                    data-site_terminal="'. $data->site_terminal .'"
                                    data-bus_number="'. $data->bus_number .'"
                                    data-bus_type="'. $data->bus_type .'"
                                    data-no_of_seats="'. $data->no_of_seats .'"
                                    data-with_wifi="'. $data->with_wifi .'"
                                    data-with_cr="'. $data->with_cr .'"
                                    data-hic-created_at="'. $data->created_at .'"
                                    onclick="showAddTripsModal(this)">
                                    <i class="fa fa-plus-circle"></i> Create Trip
                                </button>
                            </a>
                            <a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-primary btn-xs" type="button"
                                    data-hic_id="'. $data->id .'"
                                    data-bus_id_no="'. $data->bus_id_no .'"
                                    data-company_name="'. $data->company_name .'"
                                    data-bus_avatar="'. $data->bus_avatar .'"
                                    data-site_terminal="'. $data->site_terminal .'"
                                    data-bus_number="'. $data->bus_number .'"
                                    data-bus_type="'. $data->bus_type .'"
                                    data-no_of_seats="'. $data->no_of_seats .'"
                                    data-with_wifi="'. $data->with_wifi .'"
                                    data-with_cr="'. $data->with_cr .'"
                                    data-hic-created_at="'. $data->created_at .'"
                                    onclick="showEditBusUnitsModal(this)">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                            </a>
                            <a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-danger btn-xs" type="button"
                                    data-hic_id="'. $data->id .'"
                                    data-company_name="'. $data->company_name .'"
                                    data-bus_avatar="'. $data->bus_avatar .'"
                                    data-site_terminal="'. $data->site_terminal .'"
                                    data-bus_number="'. $data->bus_number .'"
                                    data-bus_type="'. $data->bus_type .'"
                                    data-no_of_seats="'. $data->no_of_seats .'"
                                    data-with_wifi="'. $data->with_wifi .'"
                                    data-with_cr="'. $data->with_cr .'"
                                    data-hic-created-at="'. $data->created_at .'"
                                    onclick="showDeleteBusUnitsModal(this)">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </a>';
                    return $action;
                })
            ->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function addBusUnits($request)
    {
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'bus_avatar' => 'image|mimes:jpeg,png,jpg|max:4048'
        ]);
        
        $busUnits = new BusUnits;
        $busUnits->bus_id_no = mt_rand(100000, 999999);
        $busUnits->hic_id_no = Auth::user()->hic_id_no;
        $busUnits->bus_number = $request->bus_number;
        $busUnits->bus_type = $request->bus_type;
        $busUnits->company_name = $request->company_name;
        $busUnits->site_terminal = $request->site_terminal;
        $busUnits->no_of_seats = $request->no_of_seats;
        $busUnits->with_wifi = $request->with_wifi;
        $busUnits->with_cr = $request->with_cr;
        $busUnits->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;

        if ($validation->passes()){
            if ($request->hasFile('bus_avatar')) {
                $avatar = $request->file('bus_avatar');
                
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('uploads/documents/'. $filename);
                Image::make($avatar)->resize(360, 360)->save($location);
                $busUnits->bus_avatar = $filename;               
            }
            
            $busUnits->save();
            DB::commit();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
        }

        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addTrips($request)
    {
        DB::beginTransaction();
        try {
    
        $trips = new Schedules;
        $trips->travel_id_no = mt_rand(100000, 999999);
        $trips->hic_id_no = Auth::user()->hic_id_no;
        $trips->bus_id_no = $request->bus_id_no;
        $trips->bus_number = $request->bus_number;
        $trips->bus_type = $request->bus_type;
        $trips->company_name = $request->company_name;
        $trips->site_terminal = $request->site_terminal;
        $trips->no_of_seats = $request->no_of_seats;
        
        if ($trips->no_of_seats == '32'){

            $trips->seat_1 = '1';
            $trips->seat_2 = '2';
            $trips->seat_3 = '3';
            $trips->seat_4 = '4';
            $trips->seat_5 = '5';
            $trips->seat_6 = '6';
            $trips->seat_7 = '7';
            $trips->seat_8 = '8';    
            $trips->seat_9 = '9';    
            $trips->seat_10 = '10';
            $trips->seat_11 = '11';
            $trips->seat_12 = '12';
            $trips->seat_13 = '13';
            $trips->seat_14 = '14';
            $trips->seat_15 = '15';
            $trips->seat_16 = '16';
            $trips->seat_17 = '17';
            $trips->seat_18 = '18';
            $trips->seat_19 = '19';
            $trips->seat_20 = '20';
            $trips->seat_21 = '21';
            $trips->seat_22 = '22';
            $trips->seat_23 = '23';
            $trips->seat_24 = '24';
            $trips->seat_25 = '25';
            $trips->seat_26 = '26';
            $trips->seat_27 = '27';
            $trips->seat_28 = '28';
            $trips->seat_29 = '29';
            $trips->seat_30 = '30';
            $trips->seat_31 = '31';
            $trips->seat_32 = '32';
            $trips->seat_33 = '33';
        }

        $trips->with_wifi = $request->with_wifi;
        $trips->with_cr = $request->with_cr;
        $trips->bus_avatar = $request->bus_avatar;
        $trips->origin_address = $request->origin_address;
        $trips->destination_address = $request->destination_address;
        $trips->driver_name = $request->driver_name;
        $trips->conductor_name = $request->conductor_name;
        $trips->fare_amount = $request->fare_amount;
        $trips->travel_date = $request->travel_date;
        $trips->travel_time = $request->travel_time;
        $trips->time_ap = $request->time_ap;
        $trips->travel_status = 'Newly Created';
        $trips->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
        
        $trips->save();
        DB::commit();
            return response()->json(['errorStatus' => 0]);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editBusUnits($request)
    {  
        $validation = Validator::make($request->all(), [
            'bus_avatar' => 'image|mimes:jpeg,png,jpg|max:4048'
        ]);

        $editBusUnits = BusUnits::where('id', $request->id)->first();
       
        if (!empty($editBusUnits)) {
        $editBusUnits->company_name = $request->company_name;
        $editBusUnits->site_terminal = $request->site_terminal;
        $editBusUnits->bus_number = $request->bus_number;
        $editBusUnits->bus_type = $request->bus_type;
        $editBusUnits->no_of_seats = $request->no_of_seats;
        $editBusUnits->with_wifi = $request->with_wifi;
        $editBusUnits->with_cr = $request->with_cr;
        $editBusUnits->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
                
        if ($validation->passes()){
            if ($request->hasFile('bus_avatar')) {
                $avatar = $request->file('bus_avatar');
                
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('uploads/documents/'. $filename);
                Image::make($avatar)->resize(360, 360)->save($location);
                $editBusUnits->bus_avatar = $filename;                
            }

            $editBusUnits->save();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
            }
        }
    }

    public function deleteBusUnits($request)
    {  
        DB::beginTransaction();
        try {
            $deletedBusUnits = BusUnits::find($request->id)->delete();
            DB::commit();
            return response()->json(['errorStatus' => 0]);
        } catch (Exception $e){
            return response()->json(['errorStatus' => 1]);
        }
    }

}
