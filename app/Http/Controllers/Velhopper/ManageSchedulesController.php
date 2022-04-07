<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\ManageSchedulesService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class ManageSchedulesController extends Controller
{
    protected $manageSchedules;

    public function __construct(ManageSchedulesService $manageSchedules)
    {
        $this->manageSchedules = $manageSchedules;
    }

    public function index()
    {
        try {
            $viewSchedules = $this->manageSchedules->indexView();
            return $viewSchedules;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    public function schedulesDtAjax(Request $request)
    {
        try {
            return $this->manageSchedules->schedulesDataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addSchedules(Request $request)
    {
        try {
            $addSchedules = $this->manageSchedules->addSchedules($request);
            return $addSchedules;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editSchedules(Request $request)
    {
        try {
            $updatedSchedules = $this->manageSchedules->editSchedules($request);
            return $updatedSchedules;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteSchedules(Request $request)
    {
        try {
            $deleteSchedules = $this->manageSchedules->deleteSchedules($request);
            return $deleteSchedules;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}