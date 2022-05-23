<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        // return $request->input();

        //validate request
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:5|max:12'
        ]);

        //insert data
        $admin = new Admin;
        $admin->name        = $request->name;
        $admin->email       = $request->email;
        $admin->password    = Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return back()->with('success','new user has been successfully added');
        }else{
            return back()->with('fail','something went wrong, try again later');
        }
    }

    function check(Request $request){
        //return $request->input();

        //validate request
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail','we do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','incorrect password');
            }
        }
    }

    function logout(){
      if(session()->has('LoggedUser')){
        session()->pull('LoggedUser');
        return redirect('/auth/login');
      }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }

    function settings(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
}
