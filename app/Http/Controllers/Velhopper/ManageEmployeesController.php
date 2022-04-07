<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\ManageEmployeesService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class ManageEmployeesController extends Controller
{
    protected $manageEmployees;

    public function __construct(ManageEmployeesService $manageEmployees)
    {
        $this->manageEmployees = $manageEmployees;
    }

    public function index()
    {
        try {
            $viewEmployees = $this->manageEmployees->indexView();
            return $viewEmployees;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    public function employeesDtAjax(Request $request)
    {
        try {
            return $this->manageEmployees->employeesDataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addEmployees(Request $request)
    {
        try {
            $addEmployees = $this->manageEmployees->addEmployees($request);
            return $addEmployees;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editEmployees(Request $request)
    {
        try {
            $editEmployees = $this->manageEmployees->editEmployees($request);
            return $editEmployees;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteEmployees(Request $request)
    {
        try {
            $deleteEmployees = $this->manageEmployees->deleteEmployees($request);
            return $deleteEmployees;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}