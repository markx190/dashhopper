<?php

namespace App\Http\Controllers\Recruitment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\DiraServices\ManageJobsService;
use App\User;
use Auth;
use Validator;
use Exception;

class ManageJobsController extends Controller
{
    protected $jobsService;

    public function __construct(ManageJobsService $jobsService)
    {
        $this->jobsService = $jobsService;
    }

    public function index()
    {
        try {
            $viewJobs = $this->jobsService->indexView();
            return $viewJobs;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addJob(Request $request)
    {
        try {
            $addJob = $this->jobsService->addJob($request);
            return $addJob;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editJob(Request $request)
    {
        try {
            $editJob = $this->jobsService->editJob($request);
            return $editJob;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteJob(Request $request)
    {
        try {
            $editJob = $this->jobsService->deleteJob($request);
            return $editJob;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    public function jobsDtAjax(Request $request)
    {
        try {
            return $this->jobsService->jobsDataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}