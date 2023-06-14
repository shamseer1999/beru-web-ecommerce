<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        return view('users.index');
    }
}
