<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        return view('admin.dashbord');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin()
    {
        $input = request()->only([
            'username','password'
        ]);
        $remember = request('remember_me');

        if(auth()->guard('admin')->attempt($input,$remember))
        {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->withInput()->with('danger','Invalid login credentials');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.login')->with('success','You are successfully logged out');
    }
}
