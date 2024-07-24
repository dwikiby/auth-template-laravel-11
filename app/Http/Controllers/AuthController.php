<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Exceptions\ThrottleRequestsException;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');
            $remember = $request->filled('remember');


            if (Auth::attempt($credentials, $remember)) {
                return redirect()->intended('/');
            } else {
                return redirect()->back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors(['email' => 'Invalid credentials']);
            }
        // } catch (ThrottleRequestsException $e) {
        //     return redirect()->back()
        //         ->withInput($request->only('email', 'remember'))
        //         ->withErrors(['email' => 'Too many login attempts. Please try again later.']);
        // }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
