<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(Request $request) {
        if($request->isMethod('post')){

            $vaildator = $request->validate([
                'email'     => 'required|email',
                'password'  => 'required'
            ]);

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error_message', 'Invalid username or password');

            }
        }else if($request->isMethod('get')){
            if(Auth::guard('admin')->check()){
                return redirect()->route('admin.dashboard');
            }
        }
        return view('admin.login');

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
