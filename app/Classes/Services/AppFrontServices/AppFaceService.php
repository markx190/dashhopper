<?php

namespace App\Classes\Services\AppFrontServices;
use Exception;

class AppFaceService
{
    public function indexView()
    {
        try {
            return view('app_front.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function indexBackOfficeView()
    {
        try {
            return view('backoffice_front.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
