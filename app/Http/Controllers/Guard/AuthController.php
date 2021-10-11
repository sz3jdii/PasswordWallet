<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View{
        return view('guard.login');
    }
    public function checkLogin(LoginRequest $request): RedirectResponse
    {

        \Toastr::error('Podano błędne dane!', 'Błąd!', ["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
