<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','price','order_count','order_id'];

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
