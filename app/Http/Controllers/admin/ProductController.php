<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ProductSaveRequest;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->paginate(10);
        $data['result'] = $products;

        return view('admin.products.index',$data);
    }

    public function add()
    {
        $data['categories'] = Category::all();

        return view('admin.products.add',$data);
    }

    public function save(ProductSaveRequest $request)
    {
        $input = $request->validated();
        //dd($input);
        $filename ='';

        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename = Str::random(7).'_'.time().'_product'.$extension;
            $request->image->storeAs('products',$filename);
        }
        
        $ins_arr = [
            'name' =>$input['product_name'],
            'price' =>$input['price'],
            'category_id' =>$input['category'],
            'is_favorite' =>$input['faveroite'],
            'image' =>$filename
        ];

        Product::create($ins_arr);

        return redirect()->route('admin.product.list')->with('success','Your produuct saved successfully');
    }
}
