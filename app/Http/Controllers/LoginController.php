<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function authencticate(Request $request)
    {
        $credentials=$request->validate([
            'name'=>'required',
            'password'=>Hash::make($request->password),
        ]);

        $request=Hash::make($request->password);

        if(Auth::attempt($credentials))
        {
            if(Auth::users()->status != 'active')
            {
                Session::flash('key', '$value');
            }
        }
    }
    
}
