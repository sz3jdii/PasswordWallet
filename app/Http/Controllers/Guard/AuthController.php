<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\GuardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View{
        return view('guard.login');
    }
    public function register(): View{
        return view('guard.register');
    }
    public function checkRegister(RegisterRequest $request): RedirectResponse{
        try{
            if(!Auth::check()){
                $user = new User();
                $user->fill($request);
                $guardService = new GuardService($request->encryption_type, $request->password);
                $user->salt = $guardService->generateSalt();
                $user->password = $guardService->generatePassword();
                dd($user);
                $user->save();
                \Toastr::success('Account created successfully! You can now log in!', 'Success!', ["positionClass" => "toast-bottom-right"]);
                return redirect('guard.login');
            }
            return redirect('guard.register');
        }catch (\Exception $e){
            \Toastr::error('Error happened during account creation!', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return redirect('guard.register');
        }

    }
    public function checkLogin(LoginRequest $request): RedirectResponse
    {

        \Toastr::error('Podano błędne dane!', 'Błąd!', ["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
