<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController
{
    private $wishlistCounts;
    private $cartItemsCounts;
    private $cartCoasts;

    public function __construct()
    {
        if(auth()->guard('customer')->user())
        {
            $this->wishlistCounts = Wishlist::where('customer_id', auth()->guard('customer')->user()->id)->count();
            $cartItems = Customer::with('Cart.productsWithPivot')->where('id',auth()->guard('customer')->user()->id)->first();
            if(!empty($cartItems->cart->productsWithPivot)){
                $this->cartItemsCounts = $cartItems->cart->productsWithPivot->count();
                $this->cartCoasts = $price_sum =$cartItems->cart->productsWithPivot->sum(function($product){
                    return $product->price * $product->pivot->product_count;
                });
                //dd($price_sum);
            }else{
                $this->cartItemsCounts = 0;
                $this->cartCoasts = 0;
            }
        }else{
            $this->wishlistCounts = 0;
            $this->cartItemsCounts = 0;
            $this->cartCoasts = 0;
        }

        view()->share('wishlistcounts',$this->wishlistCounts);
        view()->share('cartitemscounts',$this->cartItemsCounts);
        view()->share('cartcoasts',$this->cartCoasts);

    }
    public function index(Request $request)
    {
        $categories = Category::all();
        $banners = Banner::all();
        $products = Product::when($request->search != null,function($query) use($request){
            return $query->where('name','like','%'.$request->search.'%');
        })
        ->when($request->dorop_down_list !=null,function($query) use($request){
            return $query->where('category_id',$request->dorop_down_list);
        })
        ->get();


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
            if(auth()->guard('customer')->user())
            {
                $data = $request->id;
                $checkExist = Product::where('id',$data)->first();
                if($checkExist)
                {
                    $checkwishlist = Wishlist::where([
                        ['product_id','=',$data],
                        ['customer_id','=',auth()->guard('customer')->user()->id]
                    ])->first();
                    if($checkwishlist){
                        $out = array('message'=>'item already added');
                    }else{
                        Wishlist::create([
                            'product_id'=>$data,
                            'customer_id'=>auth()->guard('customer')->user()->id
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


            if(auth()->guard('customer')->attempt(['phone_no'=>$username,'password'=>$password]))
            {
                return redirect()->route('home');
            }else{
                return redirect()->route('home')->with('danger','Authentication failed');
            }
        }
    }

    public function logoutCustomer()
    {
        auth()->guard('customer')->logout();

        return redirect()->route('home')->with('success','You are successfully logged out');
    }

    public function wishlist(Request $request)
    {
        if(auth()->guard('customer')->user())
        {
            $user = auth()->guard('customer')->user()->id;
        }else{
            $user = 0;
        }

        // dd($user);
        $wishlist = wishlist::with('products')->where('customer_id',$user)->get();
        //dd($wishlist);
        $categories = Category::all();
        $data = [
            'result' => $wishlist,
            'categories'=>$categories,
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
            if(auth()->guard('customer')->user()){
                $data = $request->id;
                $checkExist = Product::where('id',$data)->first();
                if($checkExist){
                    $checkCart = Cart::where([
                        ['customer_id','=',auth()->guard('customer')->user()->id]
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
                                'product_count'=>1,
                                'created_at'=>date('Y-m-d H:i:s'),
                                'updated_at'=>date('Y-m-d H:i:s')
                            ]);
                            $out = array('message'=>'success','data'=>$checkCart);
                        }

                    }else{
                        $cart = Cart::create([
                            'customer_id'=>auth()->guard('customer')->user()->id
                        ]);

                        DB::table('cart_products')->insert([
                            'cart_id'=>$cart->id,
                            'product_id'=>$data,
                            'product_count'=>1,
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
        if(auth()->guard('customer')->user())
        {
            $user = auth()->guard('customer')->user()->id;
        }else{
            $user = 0;
        }

        if(auth()->guard('customer')->user()){
            $cartItems = Customer::with('Cart.productsWithPivot')->where('id',auth()->guard('customer')->user()->id)->first();

            if(!empty($cartItems->cart))
            {
                $result = $cartItems;
            }else{
                $result='';
            }

        }else{
            $result = '';
        }

        $categories = Category::all();

        $data = [
            'result' =>$result,
            'categories'=>$categories,
        ];

        //dd($data['result']);

        return view('users/cart',$data);

    }

    public function removeCartItem(Request $request,$id)
    {
        $itemId = decrypt($id);
        $redir = $request->redir;
        $cart = auth()->guard('customer')->user()->cart;
        $cart->products()->detach($itemId); // related product remove
        if(!empty($redir))
        {
            return redirect()->route($redir);
        }
        return redirect()->route('cart');
    }

    public function addMoreItems(Request $request)
    {
        if($request->isMethod('POST')){
            $pivot = $request->pivot_id;
            $data = DB::table('cart_products')->where('id','=',$pivot)->first();
            $count = $data->product_count;
            DB::table('cart_products')->where('id','=',$pivot)->update([
                'product_count'=>$count +1
            ]);
            $out = array('data'=>$count+1);
            return response()->json($out);
        }
    }

    public function reduceItemCount(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $pivot = $request->pivot_id;
            $data = DB::table('cart_products')->where('id','=',$pivot)->first();
            $count = $data->product_count;
            DB::table('cart_products')->where('id','=',$pivot)->update([
                'product_count'=>$count - 1
            ]);

            $out = array('data'=>$count - 1);
            return response()->json($out);
        }
    }

    public function customerSignIn(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $customerName = $request->customer_name;
            $phone = $request->phone_no;
            $password = $request->password;
            $place=$request->place;

            $checkCustomer = Customer::where('phone_no','=',$phone)->first();
            if($checkCustomer){
                return redirect()->route('home')->with('danger','Your account is already registerd!Please login');
            }else{
                $customer = Customer::create([
                    'customer_name'=>$customerName,
                    'phone_no'=>$phone,
                    'password'=>bcrypt($password),
                    'place'=>$place
                ]);
                if(auth()->guard('customer')->attempt(['phone_no'=>$phone,'password'=>$password]))
                {
                    return redirect()->route('home');
                }
            }
        }
    }

    // Cart
    public function placeOrder(Request $request)
    {
        $userId = auth()->guard('customer')->user()->id;
        $customerProfile = Customer::where('id','=',$userId)->first();
        $cartItems = Customer::with('Cart.productsWithPivot')->where('id',auth()->guard('customer')->user()->id)->first();
        // dd($cartItems);

        if($request->isMethod('POST'))
        {
            if($request->update_address)
            {
                $name = $request->name;
                $address = $request->address;
                $city = $request->city;
                $zipcode = $request->zipcode;

                $customerProfile->customer_name = $name;
                $customerProfile->address = $address;
                $customerProfile->place = $city;
                $customerProfile->zipcode = $zipcode;
                $customerProfile->save();

                return redirect()->route('place_order')->with('success','Your address updated successfully');
            }
        }
        $data=[
            'result'=>$cartItems,
            'customer'=>$customerProfile,
        ];
        return view('users/place_order',$data);
    }

    public function placeOrderConfirm(Request $request)
    {
        if(auth()->guard('customer')->user())
        {
            $userId =auth()->guard('customer')->user()->id;
            if($request->isMethod('POST'))
            {
                $payType = $request->payType;

                $customer=Customer::where('id','=',$userId)->first();

                $cartItems = Customer::with('Cart.productsWithPivot')->where('id','=',$customer->id)->first();

                // Create order
                $order = new Order();
                $order->customer_id = $customer->id;
                $order->shipping_place = $customer->place;
                $order->customer_phone = $customer->phone_no;
                $order->payment_type = $payType;
                $order->order_status = 1;

                if($order->save())
                {
                    foreach($cartItems->cart->productsWithPivot as $item)
                    {

                        // Create orderitems
                        $orderItem = new OrderItem();
                        $orderItem->product_id=$item->id;
                        $orderItem->price=$item->price;
                        $orderItem->order_count=$item->pivot->product_count;
                        $orderItem->order_id=$order->id;
                        $orderItem->save();

                        // after save remove item from cart
                        $cartItems->cart->products()->detach($item->id);


                    }

                }

                $out = array(
                    'message'=>'success',
                    'user'=>$userId,
                    'pay_type'=>$payType,
                );
            }else{
                $out = array(
                    'message'=>'not_process'
                );
            }
        }else{
            $out = array(
                'message'=>'not_authenticated'
            );
        }

        return response()->json($out);
    }
}
