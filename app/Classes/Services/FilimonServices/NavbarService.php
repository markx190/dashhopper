<?php

namespace App\Classes\Services\FilimonServices;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\Navbars;
use DB;
use Auth;
use Exception;

class NavbarService
{
    public function indexView()
    {
        try {
            return view('fil_views.manage_navbars');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addNavlink($request)
    {
        try {
            $addNavlink = Navbars::addNavlink($request);
            return $addNavlink;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function editNavlink($request)
    {
        try {
            $editNavlink = Navbars::saveUpdatedlinks($request);
            return $editNavlink;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function deleteNavlink($request)
    {
        try {
            $deleteNavlink = Navbars::saveDeleteLink($request);
            return $deleteNavlink;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function navbarsDataTable($request)
    {
        try {
            $queryNavlinks = DB::table('navbars')
                                ->select(
                                    'id',
                                    'navbar_id_no',
                                    'label_name',
                                    'position_number',
                                    'navbar_type',
                                    'navlink_status',
                                    'created_by')->get();
            $query = datatables()->of($queryNavlinks);
            return $query
            ->addColumn('action', function ($data) {
                if (Auth::user()->hic_user_level == 'Admin'){
                $action = '<a target="_blank" style="text-decoration:none;">
                            <button class="btn btn-primary btn-xs" type="button"
                            data-navbar-id="'. $data->id .'"
                            data-navbar-id-no"'. $data->navbar_id_no .'"
                            data-navbar-label-name="'. $data->label_name .'"
                            data-navbar-position-number="'. $data->position_number .'"
                            data-navbar-status="'. $data->navlink_status .'"
                            data-navbar-type="'. $data->navbar_type .'"
                            data-navbar-created-by="'. $data->created_by .'"
                            onclick="editNavlink(this)">
                            <i class="fa fa-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-xs" type="button"
                            data-navbar-id="'. $data->id .'"
                            data-navbar-id-no"'. $data->navbar_id_no .'"
                            data-navbar-label-name="'. $data->label_name .'"
                            data-navbar-position-number="'. $data->position_number .'"
                            data-navbar-status="'. $data->navlink_status .'"
                            data-navbar-type="'. $data->navbar_type .'"
                            data-navbar-created-by="'. $data->created_by .'"
                            onclick="deleteNavlink(this)">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </a>';
                return $action;
                }

                if (Auth::user()->hic_user_level == 'Client'){
                    $action = '<a target="_blank" style="text-decoration:none;">
                                <button class="btn btn-primary btn-xs" type="button"
                                data-navbar-id="'. $data->id .'"
                                data-navbar-id-no"'. $data->navbar_id_no .'"
                                data-navbar-label-name="'. $data->label_name .'"
                                data-navbar-position-number="'. $data->position_number .'"
                                data-navbar-status="'. $data->navlink_status .'"
                                data-navbar-type="'. $data->navbar_type .'"
                                data-navbar-created-by="'. $data->created_by .'"
                                onclick="editNavlink(this)">
                                <i class="fa fa-pencil-square"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-xs" type="button"
                                data-navbar-id="'. $data->id .'"
                                data-navbar-id-no"'. $data->navbar_id_no .'"
                                data-navbar-label-name="'. $data->label_name .'"
                                data-navbar-position-number="'. $data->position_number .'"
                                data-navbar-status="'. $data->navlink_status .'"
                                data-navbar-type="'. $data->navbar_type .'"
                                data-navbar-created-by="'. $data->created_by .'"
                                onclick="deleteNavlink(this)">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </a>';
                    return $action;
                    }
            })->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
