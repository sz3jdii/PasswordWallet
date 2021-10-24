<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Services\GuardService;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index(UserPassword $userPassword){
        $passwords = UserPassword::where('user_id', Auth::user()->id)->get();

        foreach ($passwords as $key =>$password){
            if($userPassword && Auth::user()->id === $userPassword->user_id && $password->id === $userPassword->id){
                $passwords[$key]->password = GuardService::decryptPassword(User::whereId(Auth::user()->id)->first(),$userPassword->password);
            }else{
                $passwords[$key]->password = "********";
            }
        }

        return view('panel.homepage.index', compact('passwords'));
    }
}
