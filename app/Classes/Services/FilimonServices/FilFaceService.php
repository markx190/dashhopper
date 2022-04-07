<?php

namespace App\Classes\Services\FilimonServices;

use Exception;

class FilFaceService
{
    public function indexView()
    {
        try {
            return view('filfront.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

}
