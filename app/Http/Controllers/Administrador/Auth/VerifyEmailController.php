<?php

namespace App\Http\Controllers\Administrador\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\Administrador\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated administrador's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('administrador')->hasVerifiedEmail()) {
            return redirect()->intended(route('administrador.dashboard').'?verified=1');
        }

        if ($request->user('administrador')->markEmailAsVerified()) {
            event(new Verified($request->user('administrador')));
        }

        return redirect()->intended(route('administrador.dashboard').'?verified=1');
    }
}
