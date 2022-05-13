<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
        //return $request->input();

        //validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }
}
