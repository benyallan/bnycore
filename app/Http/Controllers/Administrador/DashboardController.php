<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        /*
         * Uncomment the line below if you want to use verified middleware
         */
        //$this->middleware('verified:administrador.verification.notice');
    }


    public function index(){
        return view('administrador.dashboard');
    }
}
