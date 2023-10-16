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
        if(auth()->guard('admin')->user()){
            $wishlist = Wishlist::where('admin_id', auth()->guard('admin')->user()->id)->count();
        }else{
            $wishlist = 0;
        }


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
                    $checkwishlist = Wishlist::where([
                        ['product_id','=',$data],
                        ['admin_id','=',auth()->guard('admin')->user()->id]
                    ])->first();
                    if($checkwishlist){
                        $out = array('message'=>'item already added');
                    }else{
                        Wishlist::create([
                            'product_id'=>$data,
                            'admin_id'=>auth()->guard('admin')->user()->id
                        ]);
                        $out = array('message'=>'success');
                    }

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

    public function wishlist(Request $request)
    {
        if(auth()->guard('admin')->user())
        {
            $user = auth()->guard('admin')->user()->id;
        }else{
            $user = 0;
        }

        if(auth()->guard('admin')->user()){
            $wishlistCount = Wishlist::where('admin_id', auth()->guard('admin')->user()->id)->count();
        }else{
            $wishlistCount = 0;
        }
        // dd($user);
        $wishlist = wishlist::with('products')->where('admin_id',$user)->get();
        //dd($wishlist);
        $categories = Category::all();
        $data = [
            'result' => $wishlist,
            'categories'=>$categories,
            'wishlist'=>$wishlistCount
        ];

        return view('users/wishlist',$data);
    }
    public function remove_wishlist(Request $request,$id)
    {
        //dd(1);
        $wishlist = decrypt($id);
        $find = wishlist::where('id',$wishlist)->first();
        if($find){
            $find->delete();
            return redirect('wishlist');
        }
    }
}
