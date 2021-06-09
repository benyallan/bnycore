<?php

namespace App\Http\Controllers\Administrador\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('administrador.auth.confirm-password');
    }

    /**
     * Confirm the administrador's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! Auth::guard('administrador')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => __('administrador.auth.password'),
            ]);
        }

        $request->session()->put('administrador.auth.password_confirmed_at', time());

        return redirect()->intended(route('administrador.dashboard'));
    }
}
