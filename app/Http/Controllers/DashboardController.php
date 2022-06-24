<?php

namespace App\Http\Controllers;

use App\Models\AssignCoursesStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        if(auth()->check())
        {
            if(auth()->user()->role_id == 1)
            {
                return view('dashboard');
            }
            if(auth()->user()->role_id == 2)
            {
                return view('dashboard');
            }
            if(auth()->user()->role_id == 3)
            {
                return view('dashboard');
            }
        }

    }

    public function redirection()
    {
        if(auth()->user()){
            return view('dashboard');
        }
        else{
            return view('auth.login');
        }
    }

    public function registerRedirection()
    {
        if(auth()->user()){
            return view('dashboard');
        }
        else{
            return view('auth.login');
        }
    }
}
