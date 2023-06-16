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

        if(auth()->guard('admin')->attempt($input))
        {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->withInput()->with('danger','Invalid login credentials');
        }
    }
}
