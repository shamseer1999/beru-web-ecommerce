<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        $banners = Banner::all();
        $products = Product::all();

        $data = [
            'categories'=>$categories,
            'banners'=>$banners,
            'products'=>$products,
        ];
        return view('users.index',$data);
    }

    public function addToWishList(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->id;
            $checkExist = Product::where('id',$data)->first();
            if($checkExist)
            {
                //TODO:adding
            }
            $out = array('message'=>'success','data'=>$checkExist);
        }else{
            $out = array('message'=>'failed');
        }
        return response()->json($out);
    }
}
