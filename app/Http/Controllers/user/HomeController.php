<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        $banners = Banner::all();
        $products = Product::all();
        $wishlist = Wishlist::where('admin_id', auth()->guard('admin')->user()->id)->count();

        $data = [
            'categories'=>$categories,
            'banners'=>$banners,
            'products'=>$products,
            'wishlist'=>$wishlist
        ];
        return view('users.index',$data);
    }

    public function addToWishList(Request $request)
    {
        if($request->isMethod('post')){
            if(auth()->guard('admin')->user())
            {
                $data = $request->id;
                $checkExist = Product::where('id',$data)->first();
                if($checkExist)
                {
                    Wishlist::create([
                        'product_id'=>$data,
                        'admin_id'=>auth()->guard('admin')->user()->id
                    ]);
                    $out = array('message'=>'success');
                }else{
                    $out = array('message'=>'not_exist');
                }

            }else{
                $out = array('message'=>'not_authenticated');
            }

        }else{
            $out = array('message'=>'failed');
        }
        return response()->json($out);
    }

    public function customerLogin(Request $request)
    {
        if($request->isMethod('post'))
        {

            $username = $request->username;
            $password = $request->password;


            if(auth()->guard('admin')->attempt(['username'=>$username,'password'=>$password]))
            {
                return redirect()->route('home');
            }else{
                return redirect()->route('home')->with('danger','Authentication failed');
            }
        }
    }

    public function logoutCustomer()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('home')->with('success','You are successfully logged out');
    }
}
