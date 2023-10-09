<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'is_favorite',
        'category_id',
        'image',
        'product_stock'
    ];

    // protected function status() : Attribute{
    //     return Attribute::make(
    //         get:fn(string $value) => ($value == 1) ? 'Active' : 'Inactive'
    //     );
    // }

    // protected function isFavorite() : Attribute{
    //     return Attribute::make(
    //         get:fn(string $value) => ($value == 1) ? 'Yes' : 'No'
    //     );
    // }

    public function getStatusTextAttribute(){
        return ($this->status == 1) ? 'Active' : 'Inactive';
    }

    public function getIsFavoriteTextAttribute(){
        return ($this->is_favorite == 1) ? 'Yes' : 'No';
    }

    protected $appends = ['status_text','is_favorite_text'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
