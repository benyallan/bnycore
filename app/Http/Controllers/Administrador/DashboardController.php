<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Administrador;

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

    public function funcionariosIndex() {
        $funcionarios = Administrador::all();
        return view('administrador.funcionarios.funcionarios', compact('funcionarios'));
    }
}
