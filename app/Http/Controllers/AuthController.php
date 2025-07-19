<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Login the user
     */

    public function loginForm(){
        return view("components.auth.login");
    }

    public function registerForm(){
        return view("components.auth.registeration");
    }

    public function login(Request $request) : RedirectResponse
    {
        // dd($request->all());
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        
    }

    /**
     * Register
     */
    public function Register(Request $request)
    {
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
        ]);

        $data = [
            'first_name'=>$request->firstName,
            'last_name'=>$request->lastName,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        try{
            User::create($data);
            Log::info("User registration passed");
            return redirect()->back()->with(['success'=>'User Created successfully']);
        }catch(\Exception $e){
            Log::error("User registration failed : ".$e->getMessage(),['exception'=>$e]);

            return back()->withErrors([
                'email'=>'An error occurred during registration. Please try again.',
            ])->withInput($request->only('email','firstName','lastName'));
        }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}