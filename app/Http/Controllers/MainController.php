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

    public function check(Request $request){
        //return $request->input();

        //validate request
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:12'
        ]);
    }
}
