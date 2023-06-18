<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function add()
    {
        return view('admin.products.add');
    }
}
