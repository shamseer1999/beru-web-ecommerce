<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','shipping_place','customer_phone','payment_type','order_status'];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function OrderItems()
    {
        return $this->hasmany(OrderItem::class);
    }

    public function getOrderStatusAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Pending';
            case 2:
                return 'Processing';
            case 3:
                return 'Delivered';
            case 4:
                return 'Cancelled';
            default:
                return 'Unknown';
        }
    }
}
