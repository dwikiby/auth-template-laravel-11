<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

     // Reset password
     public function reset(Request $request)
     {
         $request->validate([
             'token' => 'required',
             'email' => 'required|email',
             'password' => 'required|min:8|confirmed',
         ]);
 
         $status = Password::reset(
             $request->only('email', 'password', 'password_confirmation', 'token'),
             function ($user, $password) {
                 $user->password = Hash::make($password);
                 $user->save();
 
                 Auth::login($user);
             }
         );
 
         return $status === Password::PASSWORD_RESET
                     ? redirect()->route('home')->with('status', __($status))
                     : back()->withErrors(['email' => [__($status)]]);
     }
}
