<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Services\GuardService;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class PasswordController extends Controller
{

    public function create(): View{
        $userPassword = new UserPassword();

        return view('panel.passwords.create', compact('userPassword'));
    }

    public function store(PasswordRequest $request): RedirectResponse{
        $userPassword = new UserPassword();
        $userPassword->fill($request->all());
        // AES-256-CBC
        $userPassword->password =  GuardService::encryptPassword(User::whereId(Auth::user()->id)->first(),$request->password);
        $userPassword->user_id = Auth::user()->id;
        try {
            $userPassword->save();
            \Toastr::success('Successfully added password!', 'Success!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('panel');
        } catch(\Exception $e) {
            \Toastr::error('Error occured while adding a new password. Try again later.', 'Success!', ["positionClass" => "toast-bottom-right"]);
            return back();
        }
    }
}
