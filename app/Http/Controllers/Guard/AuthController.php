<?php

namespace App\Http\Controllers\Guard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\GuardService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
                $user->fill($request->all());
                $guardService = new GuardService($request->encryption_type, $request->password);
                $user->salt = $guardService->generateSalt();
                $user->password = $guardService->generatePassword();
                $user->save();
                \Toastr::success('Account created successfully! You can now log in!', 'Success!', ["positionClass" => "toast-bottom-right"]);
                return redirect(route('guard.login'));
            }
            return redirect('guard.register');
        }catch (\Exception $e){
            \Toastr::error('Error happened during account creation!', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return redirect(route('guard.register'));
        }

    }
    public function checkLogin(LoginRequest $request): RedirectResponse
    {
        try{
            $user = User::whereEmail($request->email)->firstOrFail();
            $passwordCheck = GuardService::checkPasswords($request->password, $user->password, $user->salt, $user->encryption_type);
            if(!Auth::check() && $passwordCheck){
                Auth::login($user);
            }
            \Toastr::success('Successfully logged in!', 'Success!', ["positionClass" => "toast-bottom-right"]);
            return redirect(route('panel'));
        }catch (\Exception $e){
            \Toastr::error('Error happened during logging in!', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return redirect(route('guard.login'));
        }
    }
}
