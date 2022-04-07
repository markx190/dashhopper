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

class SubscribersService
{
    public function indexView()
    {
        try {
            return view('fil_views.manage_subscribers');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function emailTo($request)
    {
        try {
            $emailTo = Subscribers::emailTo($request);
            return $emailTo;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function subscribersDataTable($request)
    {\Log::info('subs');
        try {
            $querySubscribers = DB::table('subscribers')
                                ->select(
                                    'id',
                                    'subs_id_no',
                                    'first_name',
                                    'last_name',
                                    'email',
                                    'created_at')->get();
            $query = datatables()->of($querySubscribers);
            return $query
            ->editColumn('first_name', function ($data) {
                return $data->first_name .' '. $data->last_name;
            })->addColumn('action', function ($data) {
                
                $action = '<a target="_blank" style="text-decoration:none;">
                            <button class="btn btn-primary btn-xs" type="button"
                            onclick="editNavlink(this)">
                            <i class="fa fa-pencil-square"></i> View
                            </button>
                        </a>';
                    return $action;
                
            })->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
