<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\ManageBusUnitsService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class ManageBusUnitsController extends Controller
{
    protected $manageBusUnits;

    public function __construct(ManageBusUnitsService $manageBusUnits)
    {
        $this->manageBusUnits = $manageBusUnits;
    }

    public function index()
    {
        try {
            $viewBusUnits = $this->manageBusUnits->indexView();
            return $viewBusUnits;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    public function BusUnitsDtAjax(Request $request)
    {
        try {
            return $this->manageBusUnits->busDataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addBusUnits(Request $request)
    {
        try {
            $addBusUnit = $this->manageBusUnits->addBusUnits($request);
            return $addBusUnit;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function createTrips(Request $request)
    {
        try {
            $addTrips = $this->manageBusUnits->addTrips($request);
            return $addTrips;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getTripDrivers(Request $request)
    {
        try {
            $getTripDrivers = $this->manageBusUnits->getTripDrivers($request);
            return $getTripDrivers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getTripConductors(Request $request)
    {
        try {
            $getTripConductors = $this->manageBusUnits->getTripConductors($request);
            return $getTripConductors;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editBusUnits(Request $request)
    {
        try {
            $editBusUnit = $this->manageBusUnits->editBusUnits($request);
            return $editBusUnit;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteBusUnits(Request $request)
    {
        try {
            $deleteBusUnit = $this->manageBusUnits->deleteBusUnits($request);
            return $deleteBusUnit;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}