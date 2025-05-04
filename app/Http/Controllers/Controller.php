<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome() 
    {
        return view('welcome');
    }

    public function dashboard() 
    {
        $patients = Patient::count();
        return view('admin.dashboard', compact('patients'));
    }
}
