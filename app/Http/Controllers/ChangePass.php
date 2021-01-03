<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ],[
            'oldPassword.required' => 'This Current Password Fild Must Be Required',
            'password.min' => 'Password Need Morethan 8 Character',
            'password.required' => 'Password Fild Must Be Required',
            'password_confirmation.required' => 'Confirm Password Fild Must Be Required',
            'password_confirmation.min' => 'Confirm Password Need Morethan 8 Character'
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword, $hashPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Change Successfully');
        }else{
            return redirect()->back()->with('error', 'Current Password is Invalid');
        }
    }
}
