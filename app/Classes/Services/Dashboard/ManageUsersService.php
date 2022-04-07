<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use DB;
use Exception;
use Auth;

class ManageUsersService
{
    public function indexView()
    {
        try {
            date_default_timezone_set('Asia/Manila');
            $dTime = date('F j, Y');
            $hicUsers = User::all();
            return view('velhopper.manage_list_of_users', [
                'hicUsers' => $hicUsers,
                'dateTime' => $dTime
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dataTable($request)
    {
        try {
            $queryUsers = DB::table('users')
                            ->select('id', 
                            'hic_id_no', 
                            'hic_name', 
                            'user_account_type', 
                            'user_firstname', 
                            'user_lastname', 
                            'hic_contact_no', 
                            'hic_user_level', 
                            'hic_position', 
                            'email', 
                            'hic_user_status', 
                            'created_at')->where('hic_name', Auth::user()->hic_name);                  

            if ($request->userAccountType){
                $queryUsers->where('user_account_type', $request->userAccountType); 
            }

            if ($request->userPosition){
                $queryUsers->where('hic_position', $request->userPosition); 
            }

            if ($request->userAccountType == 'All'){
                $queryUsers = DB::table('users')
                            ->select('id', 
                            'hic_id_no', 
                            'hic_name', 
                            'user_account_type', 
                            'user_firstname', 
                            'user_lastname', 
                            'hic_contact_no', 
                            'hic_user_level', 
                            'hic_position',
                            'email', 
                            'hic_user_status', 
                            'created_at')->where('hic_name', Auth::user()->hic_name);                    
            }

            $queryUsers->get();

            $query = datatables()->of($queryUsers);
            return $query
                ->editColumn('user_firstname', function ($data) {
                return $data->user_firstname .' '. $data->user_lastname;
            })
            ->addColumn('action', function ($data) {
                $editUser = $data->id;
                $deleteUser = $data->id;
                $action = '
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-primary btn-xs" type="button"
                            data-hic-id="'. $data->id .'"
                            data-hic-name="'. $data->hic_name .'"
                            data-user-name"'. $data->user_firstname. ' '. $data->user_lastname .'"
                            data-hic-user-status="'. $data->hic_user_status .'"
                            data-hic-created-at="'. $data->created_at .'"
                            onclick="editUser('. $data->id .', '. $editUser .', this)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </a>
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-danger btn-xs" type="button"
                            data-e-hic-id="'. $data->id .'"
                            data-hic-name="'. $data->hic_name .'"
                            data-e-user-name"'. $data->user_firstname.' '.$data->user_lastname.'"
                            data-function="'. $data->user_firstname.' '.$data->user_lastname .'"
                            onclick="deleteUserModal(this)">
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

    public function editUsers(Request $request)
    {
        try {
            $updatedUsers =  User::saveEditedUsers($request);
            return $updatedUsers;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function deleteUsers(Request $request)
    {
        try {
            $deletedUsers =  User::saveDelitedUsers($request);
            return $deletedUsers;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

}
