<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\GuardService;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public function edit(User $user): View
    {
        if(Auth::user()->id !== $user->id){
            \Toastr::error('You have no rights to do that.', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return back();
        }
        return view('panel.users.edit', compact('user'));
    }
    public function update(UserRequest $request,  User $user): RedirectResponse
    {
        if(Auth::user()->id !== $user->id){
            \Toastr::error('You have no rights to do that.', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return back();
        }
        DB::beginTransaction();

        $guardService = new GuardService($user->encryption_type, $request->password);
        $user->salt = $guardService->generateSalt();
        $newUserPassword = $guardService->generatePassword();
        try {
            $userPasswords = UserPassword::where('user_id', $user->id)->get();
            foreach($userPasswords as $userPassword){
                $decryptedOldUserPassword = GuardService::decryptPassword($user->password,$userPassword->password);
                $encryptedNewUserPassword = GuardService::encryptPassword($newUserPassword,$decryptedOldUserPassword);
                $userPassword->password = $encryptedNewUserPassword;
                $userPassword->save();
            }
            $user->password = $newUserPassword;
            $user->save();
            DB::commit();
            \Toastr::success('Successfully updated user!', 'Success!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('panel');
        } catch(\Exception $e) {
            DB::rollBack();
            \Toastr::error('Error occured while updating user. Try again later.', 'Error!', ["positionClass" => "toast-bottom-right"]);
            return back();
        }
    }
}
