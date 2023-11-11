<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Models\OrderItem;

class OrderController
{

    public function index()
    {
        $orders = OrderItem::with(['Order','Order.Customer','Product','Product.category'])->orderby('created_at','DESC')->paginate(10);
        //dd($orders);
        $data = [
            'result'=>$orders
        ];
        return view('admin.orders.index',$data);
    }
}
