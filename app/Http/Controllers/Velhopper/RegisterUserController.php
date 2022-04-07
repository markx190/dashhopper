<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\AppFrontServices\RegisterUserService;
use App\User;
use Auth;
use Validator;
use Exception;

class RegisterUserController extends Controller
{
    protected $registerService;

    public function __construct(RegisterUserService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function regForm(Request $request)
    {
        try {
            return $this->registerService->viewRegForm($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function create(Request $request)
    {
        try {
            $addUser = $this->registerService->addUser($request);
            return $addUser;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
}