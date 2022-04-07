<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\Employees;
use DB;
use Exception;
use Auth;
use Validator;
use Image;

class ManageEmployeesService
{
    public function indexView()
    {
        try {
            date_default_timezone_set('Asia/Manila');
            $dTime = date('F j, Y');
            $hicUsers = User::all();
                return view('velhopper.manage_list_of_employees', [
                    'hicUsers' => $hicUsers,
                    'companyName' => Auth::user()->hic_name,
                    'siteTerminal' => Auth::user()->hic_network,
                    'dateTime' => $dTime
                ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function employeesDataTable($request)
    {
        try {
            $queryEmployees = DB::table('employees')
                            ->select('id', 
                            'hic_id_no', 
                            'employee_id_no',
                            'firstname', 
                            'lastname', 
                            'middlename', 
                            'company_name',
                            'site_terminal',
                            'position', 
                            'contact_number', 
                            'employee_avatar',
                            'created_at')->where('company_name', Auth::user()->hic_name);                  

            if ($request->positionVal){
                $queryEmployees->where('position', $request->positionVal); 
            }

            if ($request->positionVal == 'All'){
                $queryEmployees = DB::table('employees')
                            ->select('id', 
                            'hic_id_no', 
                            'employee_id_no',
                            'firstname', 
                            'lastname', 
                            'middlename', 
                            'company_name',
                            'site_terminal',
                            'position', 
                            'contact_number', 
                            'employee_avatar',
                            'created_at')->where('company_name', Auth::user()->hic_name);               
            }

            $queryEmployees->get();

            $queryResults = datatables()->of($queryEmployees);
                return $queryResults
                ->editColumn('firstname', function ($data) {
                return $data->firstname .' '. $data->lastname;
                })->addColumn('action', function ($data) {
                        $action = '
                            <a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-primary btn-xs" type="button"
                                    data-employee_id="'. $data->id .'"
                                    data-employee_id_no="'. $data->employee_id_no .'"
                                    data-firstname="'. $data->firstname .'"
                                    data-middlename="'. $data->middlename .'"
                                    data-lastname="'. $data->lastname .'"
                                    data-company_name="'. $data->company_name .'"
                                    data-site_terminal="'. $data->site_terminal .'"
                                    data-employee_position="'. $data->position .'"
                                    data-contact_number="'. $data->contact_number .'"
                                    data-employee_avatar="'. $data->employee_avatar .'"
                                    data-created_at="'. $data->created_at .'"
                                    onclick="showEditEmployeesModal(this)">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                            </a>
                            <a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-danger btn-xs" type="button"
                                    data-employee_id="'. $data->id .'"
                                    data-employee_id_no="'. $data->employee_id_no .'"
                                    data-firstname="'. $data->firstname .'"
                                    data-middlename="'. $data->middlename .'"
                                    data-lastname="'. $data->lastname .'"
                                    data-company_name="'. $data->company_name .'"
                                    data-site_terminal="'. $data->site_terminal .'"
                                    data-employee_position="'. $data->position .'"
                                    data-contact_number="'. $data->contact_number .'"
                                    data-employee_avatar="'. $data->employee_avatar .'"
                                    data-created_at="'. $data->created_at .'"
                                    onclick="showDeleteEmployeesModal(this)">
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

    public function addEmployees($request)
    {
        DB::beginTransaction();
        try {
        $validation = Validator::make($request->all(), [
            'employee_avatar' => 'image|mimes:jpeg,png,jpg|max:4048'
        ]);
        
        $employees = new Employees;
        $employees->employee_id_no = $request->employee_id_no;
        $employees->hic_id_no = Auth::user()->hic_id_no;
        $employees->company_name = $request->company_name;
        $employees->site_terminal = $request->site_terminal;
        $employees->firstname = $request->firstname;
        $employees->lastname = $request->lastname;
        $employees->contact_number = $request->contact_number;
        $employees->position = $request->position;
        $employees->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;

        if ($validation->passes()){
            if ($request->hasFile('employee_avatar')) {
                $employee_avatar = $request->file('employee_avatar');
                
                $filename = time() . '.' . $employee_avatar->getClientOriginalExtension();
                $location = public_path('uploads/avatars/'. $filename);
                Image::make($employee_avatar)->resize(360, 360)->save($location);
                $employees->employee_avatar = $filename;               
            }
           
            $employees->save();
            DB::commit();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
        }

        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editEmployees($request)
    {
        $validation = Validator::make($request->all(), [
            'employee_avatar' => 'image|mimes:jpeg,png,jpg|max:4048'
        ]);

        $editEmployees = Employees::where('id', $request->id)->first();
       
        if (!empty($editEmployees)) {
        
        $editEmployees->employee_id_no = $request->employee_id_no;
        $editEmployees->company_name = $request->company_name;
        $editEmployees->site_terminal = $request->site_terminal;
        $editEmployees->firstname = $request->firstname;
        $editEmployees->lastname = $request->lastname;
        $editEmployees->position = $request->position;
        $editEmployees->contact_number = $request->contact_number;
        $editEmployees->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
                
        if ($validation->passes()){
            if ($request->hasFile('employee_avatar')) {
                $employee_avatar = $request->file('employee_avatar');
                
                $filename = time() . '.' . $employee_avatar->getClientOriginalExtension();
                $location = public_path('uploads/avatars/'. $filename);
                Image::make($employee_avatar)->resize(360, 360)->save($location);
                $editEmployees->employee_avatar = $filename;                
            }

            $editEmployees->save();
            return response()->json(['errorStatus' => 0]);

        } else {
            return response()->json(['errorStatus' => 1]);
            }
        }
    }

    public function deleteEmployees($request)
    {  
        DB::beginTransaction();
        try {
            $deleteEmployees = Employees::find($request->id)->delete();
            DB::commit();
            return response()->json(['errorStatus' => 0]);
        } catch (Exception $e){
            return response()->json(['errorStatus' => 1]);
        }
    }

}
