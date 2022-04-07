<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\ManageProfileService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;
use DB;

class ManageProfileController extends Controller
{
    protected $manageProfile;

    public function __construct(ManageProfileService $manageProfile)
    {
        $this->manageProfile = $manageProfile;
        $this->middleware('auth');
    }

    public function viewProfile()
    {
        try {
            return $this->manageProfile->viewProfile();
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function updateProfilePage()
    {
        try {
            return $this->manageProfile->updateProfilePage();
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function saveUpdatedProfile(Request $request)
    {
        try {
            return $this->manageProfile->saveUpdatedProfile($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editAvatar(Request $request)
    {
        try {
            return $this->manageProfile->editAvatar($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function listOfDocuments(Request $request)
    {
        try {
            return $this->manageProfile->listOfDocuments($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function documentsDtAjax(Request $request)
    {
        try {
            return $this->manageProfile->docsdataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addDocuments(Request $request)
    {
        try {
            return $this->manageProfile->addDocuments($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editDocuments(Request $request)
    {
        try {
            return $this->manageProfile->editDocuments($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteDocuments(Request $request)
    {
        try {
            return $this->manageProfile->deleteDocuments($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}