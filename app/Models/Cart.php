<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id'];

    public function products(){
        return $this->belongsToMany(Product::class,'cart_products');
    }

    public function productsWithPivot(){
        return $this->products()->withPivot('id','product_count');
    }


}
