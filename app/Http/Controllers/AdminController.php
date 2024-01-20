<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(Request $request) {
        if($request->isMethod('post')){
            $request->validate([
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

    //update admin password
    public function updatePassword(Request $request){
        if($request->isMethod('get')){
            return view('admin.update-password');
        }else if($request->isMethod('post')){

            if(Hash::check($request->current_password, Auth::guard('admin')->user()->password)){
                return "true";
            }else{
                return "false";
            }
        }

    }

    public function updateAdminPassword(Request $request){
            //return $request->all();
        if(Hash::check($request->curent_password, Auth::guard('admin')->user()->password)){
            if($request->new_password == $request->confirm_password){
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                if($admin){
                    $admin->update(['password' => bcrypt($request->new_password)]);
                    return redirect()->route('admin.update-password')->with('success', 'Admin password has been updated!');
                }
            }else{
                return redirect()->route('admin.update-password')->with('error_match', 'Confirm password does not match!');
            }
        }else{
            return redirect()->route('admin.update-password')->with('error_password', 'Incorrect password');
        }
    }


}
