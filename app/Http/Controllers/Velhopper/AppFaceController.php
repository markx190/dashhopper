<?php

namespace App\Http\Controllers\Velhopper;

use App\Classes\Services\AppFrontServices\AppFaceService;
use App\Http\Controllers\Controller;

class AppFaceController extends Controller
{
    protected $appFacePage;

    public function __construct(AppFaceService $appFacePage)
    {
        $this->appFacePage = $appFacePage;
    }

    public function index()
    {
        try {
            return $this->appFacePage->indexView();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function backoffice()
    {
        try {
            return $this->appFacePage->indexBackOfficeView();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
