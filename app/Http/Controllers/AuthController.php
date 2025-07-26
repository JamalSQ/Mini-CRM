<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;


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

        try{
            $agent = new Agent(); // Instantiate the User-Agent parser

            $userData['terms_signature'] = hash('sha256', $request->ip() . $request->userAgent() . now()); // Simple signature
            $userData['terms_signature_ip'] = $request->ip();
            $userData['terms_signature_user_agent'] = $request->userAgent();

            // Device Information (using jenssegers/agent)
            $userData['terms_signature_device'] = $agent->device() ?: 'Unknown';
            $userData['terms_signature_device_type'] = $agent->isDesktop() ? 'desktop' : ($agent->isTablet() ? 'tablet' : ($agent->isMobile() ? 'mobile' : 'unknown'));
            $userData['terms_signature_device_name'] = $agent->device() ?: null;
            $userData['terms_signature_device_manufacturer'] = $agent->device() ?: null; // Agent sometimes maps this to device
            $userData['terms_signature_device_os'] = $agent->platform() ?: null;
            $userData['terms_signature_device_os_version'] = $agent->version($agent->platform()) ?: null;

            // Browser Information
            $userData['terms_signature_browser'] = $agent->browser() ?: null;
            $userData['terms_signature_browser_version'] = $agent->version($agent->browser()) ?: null;
            $userData['terms_signature_browser_language'] = $request->header('Accept-Language') ?: null; // Or use $request->getPreferredLanguage()
            $userData['terms_signature_browser_platform'] = $agent->platform() ?: null; // Often same as device OS
                \Log::info("users information",$userData);
            }catch(\Exception $e){
                \Log::info("users in catch",['array'=>$e]);
            }

            $userData['first_name'] = $request->firstName;
            $userData['last_name']=$request->lastName;
            $userData['email']=$request->email;
            $userData['address']=$request->address;
            $userData['phone_number']=$request->phone_number;
            $userData['password']=Hash::make($request->password);

        try{
            $user = User::create($userData);
            $user->assignRole('user');
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