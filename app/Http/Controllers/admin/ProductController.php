<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ProductSaveRequest;

use App\Models\Category;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function add()
    {
        $data['categories'] = Category::all();

        return view('admin.products.add',$data);
    }

    public function save(ProductSaveRequest $request)
    {
        $input = $request->input();
        dd($input);
        dd(request()->all());
    }
}
