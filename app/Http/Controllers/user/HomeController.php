<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        $banners = Banner::all();
        $products = Product::all();
        if(auth()->guard('admin')->user()){
            $wishlistCount = Wishlist::where('admin_id', auth()->guard('admin')->user()->id)->count();
            $cartItems = Admin::with('Cart.products')->where('id',auth()->guard('admin')->user()->id)->first();
            $cartItemsCount = $cartItems->cart->products->count();
            $cartCoast = $cartItems->cart->products->pluck('price')->sum();

        }else{
            $wishlistCount = 0;
            $cartItemsCount = 0;
            $cartCoast = 0;
        }


        $data = [
            'categories'=>$categories,
            'banners'=>$banners,
            'products'=>$products,
            'wishlist'=>$wishlistCount,
            'cart'=>$cartItemsCount,
            'cartCoast'=>$cartCoast
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
            $cartItems = Admin::with('Cart.products')->where('id',auth()->guard('admin')->user()->id)->first();
            $cartItemsCount = $cartItems->cart->products->count();
            $cartCoast = $cartItems->cart->products->pluck('price')->sum();
        }else{
            $wishlistCount = 0;
            $cartItemsCount = 0;
            $cartCoast = 0;
        }
        // dd($user);
        $wishlist = wishlist::with('products')->where('admin_id',$user)->get();
        //dd($wishlist);
        $categories = Category::all();
        $data = [
            'result' => $wishlist,
            'categories'=>$categories,
            'wishlist'=>$wishlistCount,
            'cart'=>$cartItemsCount,
            'cartCoast'=>$cartCoast
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

    public function addToCart(Request $request)
    {
        if($request->isMethod('POST')){
            if(auth()->guard('admin')->user()){
                $data = $request->id;
                $checkExist = Product::where('id',$data)->first();
                if($checkExist){
                    $checkCart = Cart::where([
                        ['admin_id','=',auth()->guard('admin')->user()->id]
                    ])->first();
                    if($checkCart){
                        $checkProduct = DB::table('cart_products')
                                ->where('product_id',$data)
                                ->where('cart_id',$checkCart->id)
                                ->first();
                        if($checkProduct){
                            $out = array('message'=>'Item already added to cart');
                        }else{
                            DB::table('cart_products')->insert([
                                'cart_id'=>$checkCart->id,
                                'product_id'=>$data,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            ]);
                            $out = array('message'=>'success','data'=>$checkCart);
                        }

                    }else{
                        $cart = Cart::create([
                            'admin_id'=>auth()->guard('admin')->user()->id
                        ]);

                        DB::table('cart_products')->insert([
                            'cart_id'=>$cart->id,
                            'product_id'=>$data,
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        ]);

                        $out = array('message'=>'success','data'=>$cart);
                    }
                }else{
                    $out = array('message'=>'not_exist');
                }
            }else{
                $out = array('message'=>'not_authenticated');
            }

            return response()->json($out);
        }
    }

    public function cart(Request $request)
    {
        if(auth()->guard('admin')->user())
        {
            $user = auth()->guard('admin')->user()->id;
        }else{
            $user = 0;
        }

        if(auth()->guard('admin')->user()){
            $wishlistCount = Wishlist::where('admin_id', auth()->guard('admin')->user()->id)->count();
            $cartItems = Admin::with('Cart.products')->where('id',auth()->guard('admin')->user()->id)->first();
            $cartItemsCount = $cartItems->cart->products->count();
            $cartCoast = $cartItems->cart->products->pluck('price')->sum();
        }else{
            $wishlistCount = 0;
            $cartItemsCount = 0;
            $cartCoast = 0;
        }

        $categories = Category::all();

        $data = [
            'result' => $cartItems->cart->products,
            'categories'=>$categories,
            'wishlist'=>$wishlistCount,
            'cart'=>$cartItemsCount,
            'cartCoast'=>$cartCoast
        ];

        return view('users/cart',$data);

    }
}
